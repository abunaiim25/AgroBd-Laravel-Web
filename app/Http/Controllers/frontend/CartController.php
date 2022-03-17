<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;//add

class CartController extends Controller
{

    //===============cart_add=================
    public function cart_add(Request $request, $id)
   { 
        $check = Cart::where('product_id',$id)->where('user_id', Auth::id())->where('user_ip',request()->ip())->first();
        if ($check) {
           // Cart::where('product_id',$id)->where('user_ip',request()->ip())->increment('qty');
            return Redirect()->back()->with('status','Already Product added on Cart, Please you should go to Cart section or continue shopping other things.');
        }else{
            Cart::insert([
                'product_id' => $id,
                'qty' => $request->qty,
                'price' => $request->price,
                'user_id' => auth()->id(),
                'user_ip' => request()->ip(),
            ]);
            return Redirect()->back()->with('status','Product added on Cart, Please you should go to Cart section or continue shopping other things.');
        }
    }

//===============cart_page=================
public function cart_page()
{
   $carts = Cart::where('user_id', Auth::id())->where('user_ip',request()->ip())->latest()->get();
    $subtotal = Cart::all()->where('user_id', Auth::id())->where('user_ip',request()->ip())->sum(function($t){
        return $t->price * $t->qty;
     });
     return view('frontend.cart',compact('carts','subtotal'));
}

  //=====================cart quantity update====================
  public function cart_quantity_update(Request $request, $id){
    Cart::where('id',$id)->where('user_ip',request()->ip())->update([
        'qty' => $request->qty,
    ]);
    return Redirect()->back()->with('status','Quantity Updated');
}

//======================cart destroy===============================
public function cart_destroy($id){
    Cart::where('id',$id)->where('user_ip',request()->ip())->delete();
    return Redirect()->back()->with('status','Cart Product Removed');
}


    //======================= discount applied =========================
    public function discount_apply(Request $request){
        $check = Discount::where('discount_name',$request->discount_name)->first();
        if ($check)
         {  
            $subtotal = Cart::all()->where('user_id', Auth::id())->where('user_ip',request()->ip())->sum(function($t){
            return $t->price * $t->qty;
            });

            Session::put('discount',[
                'discount_name' => $check->discount_name,
                'discount_percentage' => $check->discount_persent,
                'discount_amount' => $subtotal * ($check->discount_persent/100),
            ]);
            return Redirect()->back()->with('status','Successfully Discount Applied');
        }
        else
        {
            return Redirect()->back()->with('status','Invalid Discount');
        }
    }

    // coupon destroy 
    public function discount_destroy(){
        if (Session::has('discount')) {
           session()->forget('discount');
           return Redirect()->back()->with('status','Discount Removed Success');
        }
    }


}
