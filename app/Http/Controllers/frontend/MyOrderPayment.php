<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\OrderitemPayment;
use App\Models\OrderPayment;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class MyOrderPayment extends Controller
{
    //===============my_orders payment======================
    public function my_order_payment()
    {
        $orders = OrderPayment::where('user_id', Auth::id())->latest()->paginate(10);
        return view('frontend.order.payment_myorder.my_order', compact('orders'));
    }

    public function my_orders_view_payment($id)
    {
        $order = OrderPayment::findOrFail($id);
        $orderItems = OrderitemPayment::where('order_id', $id)->get();
        $shipping = Payment::where('order_id', $id)->first();
        return view('frontend.order.payment_myorder.my_order_view', compact('order', 'orderItems', 'shipping'));
    }

    public function my_orders_delete_payment($id)
    {
        OrderPayment::findOrFail($id)->delete();
        OrderitemPayment::where('order_id', $id)->delete();
        Payment::where('order_id', $id)->delete();
        return Redirect()->back()->with('delete', 'Order Deleted');
    }


    public function my_shipping_edit_payment($id)
    {
        $order = OrderPayment::findOrFail($id);
        $shipping = Payment::where('order_id', $id)->first();
        return view('frontend.order.payment_myorder.edit', compact('order', 'shipping'));
    }


    public function update_my_shipping_payment(Request $request, $id)
    {

        $data = Payment::find($id);
        $data->amount = $request->amount;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->state = $request->state;
        $data->post_code = $request->post_code;
        $data->description = $request->description;
        $data->update();

      
        return Redirect::to('my_order_payment')->with('status', 'Shipping Updated Successfully');
    }


}
