<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Shipping;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function place_order(Request $request)
    {
        $request->validate([
            'payment_type' => 'required',
            'post_code' => 'integer',
        ]);

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'invoice_no' => mt_rand(10000000, 99999999),
            'payment_type' => $request->payment_type,
            'total' => $request->total,
            'subtotal' => $request->subtotal,
            'discount_percentage' => $request->discount_percentage,
            'created_at' => Carbon::now(),
        ]);


        $carts = Cart::where('user_id', Auth::id())->where('user_ip', request()->ip())->latest()->get();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->product_id,
                'product_qty' => $cart->qty,
                'created_at' => Carbon::now(),
            ]);

            /*stock or outOfStock */
            $prod = Product::where('id', $cart->product_id)->first();
            $prod->product_quantity = $prod->product_quantity - $cart->qty;
            $prod->update();
        }


        Shipping::insert([
            'order_id' => $order_id,
            'user_id' => $request->User_id,
            'shipping_name' => $request->shipping_name,
            'shipping_email' => $request->shipping_email,
            'shipping_phone' => $request->shipping_phone,
            'address' => $request->address,
            'state' => $request->state,
            'post_code' => $request->post_code,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);

        if (Session::has('discount')) {
            session()->forget('discount');
        }

        //delete from cart
        Cart::where('user_id', Auth::id())->where('user_ip', request()->ip())->delete();
        return Redirect()->to('/')->with('status', 'Your order successfully done. We will contact as soon as possible, Thank you.');
    }


    //===============my_orders======================
    public function my_orders()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->paginate(10);
        return view('frontend.order.my_order', compact('orders'));
    }

    public function my_orders_view($id)
    {
        $order = Order::findOrFail($id);
        $orderItems = OrderItem::where('order_id', $id)->get();
        $shipping = Shipping::where('order_id', $id)->first();
        return view('frontend.order.my_order_view', compact('order', 'orderItems', 'shipping'));
    }

    public function my_orders_delete($id)
    {
        Order::findOrFail($id)->delete();
        return Redirect()->back()->with('delete', 'Order Deleted');
    }


    public function my_shipping_edit($id)
    {
        $order = Order::findOrFail($id);
        $shipping = Shipping::where('order_id', $id)->first();
        return view('frontend.order.edit', compact('order', 'shipping'));
    }

    public function update_my_shipping(Request $request, $id){      

        Shipping::find($id)->update([
            'shipping_name' => $request->shipping_name,
            'shipping_email' => $request->shipping_email,
            'shipping_phone' => $request->shipping_phone,
            'address' => $request->address,
            'state' => $request->state,
            'post_code' => $request->post_code,
            'description' => $request->description,
            'updated_at' => Carbon::now()
        ]);

        return Redirect::to('my_orders')->with('status','Shipping Updated Successfully');
    }
}
