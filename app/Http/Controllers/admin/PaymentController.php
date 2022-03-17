<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OrderitemPayment;
use App\Models\OrderPayment;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function admin_payment_online(){
        $order_payment = OrderPayment::where('status',0)->latest()->paginate(10);
        return view('admin.order.payment_order.index',compact('order_payment'));
    }

    public function admin_payment_orders_view($id){
        $order_payment = OrderPayment::findOrFail($id);
        $orderItems_payment = OrderitemPayment::where('order_id',$id)->get();
        $shipping_payment = Payment::where('order_id',$id)->first();
        return view('admin.order.payment_order.payment_order_view',compact('order_payment','orderItems_payment','shipping_payment'));
    }

    public function admin_payment_orders_delete($id){
           OrderPayment::findOrFail($id)->delete();
           OrderitemPayment::where('order_id',$id)->delete();
           Payment::where('order_id',$id)->first()->delete();
           return Redirect()->back()->with('delete','Order Deleted');
       }

    public function update_payment_status(Request $request, $id)
    {
        $order_payment = OrderPayment::findOrFail($id);
        $order_payment->status = $request->input('order_status');
        $order_payment->update();
        return redirect('admin_payment_online')->with('status',"Order Status Updated Successfully");
    }


    //=======================history================================
    public function order_payment_history()
    {
    $order_payment = OrderPayment::where('status',1)->paginate(10);
     return view('admin.order.payment_order.order_payment_history',compact("order_payment"));
    }

              //searching orders_search
              public function payment_orders_search(Request $request)
              {
                  $order_payment = OrderPayment::
                  join('users',  'order_payments.user_id','users.id')->select('order_payments.*','users.email') //users table join on (orders.user_id) 
                  ->where('invoice_no','like','%'.$request->search.'%')
                  ->orWhere('email','like','%'.$request->search.'%')
                  ->orWhere('payment_type','like','%'.$request->search.'%')
                  ->orWhere('total','like','%'.$request->search.'%')
                  ->orWhere('subtotal','like','%'.$request->search.'%')
                  ->paginate(10);
          
                  return view('admin.order.payment_order.index',compact('order_payment'));
              }
          
              public function payment_orders_history_search(Request $request)
              {
                  $order_payment = OrderPayment::
                  join('users',  'order_payments.user_id','users.id')->select('order_payments.*','users.email') //users table join on (orders.user_id) = query join
                  ->where('invoice_no','like','%'.$request->search.'%')
                  ->orWhere('email','like','%'.$request->search.'%')
                  ->orWhere('payment_type','like','%'.$request->search.'%')
                  ->orWhere('total','like','%'.$request->search.'%')
                  ->orWhere('subtotal','like','%'.$request->search.'%')
                  ->paginate(10);
                  return view('admin.order.payment_order.order_payment_history',compact("order_payment"));
              }
}
