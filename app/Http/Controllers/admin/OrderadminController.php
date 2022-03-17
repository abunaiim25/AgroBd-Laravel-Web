<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Http\Request;

class OrderadminController extends Controller
{
    public function admin_orders_view($id){
        $order = Order::findOrFail($id);
        $orderItems = OrderItem::where('order_id',$id)->get();
        $shipping = Shipping::where('order_id',$id)->first();
        return view('admin.order.order_view',compact('order','orderItems','shipping'));
    }

    
    public function update_order_status(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('/home')->with('status',"Order Status Updated Successfully");
    }

    public function order_status_history()
    {
    $orders = Order::where('status',1)->latest()->paginate(10);
     return view('admin.order.history_order',compact("orders"));
    }

    public function admin_orders_delete($id){
        Order::findOrFail($id)->delete();
        OrderItem::where('order_id',$id)->delete();
        $shipping = Shipping::where('order_id',$id)->delete();
           return Redirect()->back()->with('delete','Order Deleted');
       }
    

          //searching orders_search
    public function orders_search(Request $request)
    {
        $orders = Order::
        //users table join on (orders.user_id) table = query join
        join('users',  'orders.user_id','users.id')->select('orders.*','users.email')
        ->where('invoice_no','like','%'.$request->search.'%')
        ->orWhere('email','like','%'.$request->search.'%')
        ->orWhere('payment_type','like','%'.$request->search.'%')
        ->orWhere('total','like','%'.$request->search.'%')
        ->orWhere('subtotal','like','%'.$request->search.'%')
        ->paginate(10);

        return view('admin.order.index',compact('orders'));
    }

    public function orders_history_search(Request $request)
    {
        $orders = Order::
        //users table join on (orders.user_id) table = query join
        join('users',  'orders.user_id','users.id')->select('orders.*','users.email')
        ->where('invoice_no','like','%'.$request->search.'%')
        ->orWhere('email','like','%'.$request->search.'%')
        ->orWhere('payment_type','like','%'.$request->search.'%')
        ->orWhere('total','like','%'.$request->search.'%')
        ->orWhere('subtotal','like','%'.$request->search.'%')
        ->paginate(10);
        return view('admin.order.history_order',compact("orders"));
    }
}
