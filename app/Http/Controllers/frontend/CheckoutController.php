<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $carts = Cart::where('user_id', Auth::id())->latest()->get();
            $subtotal = Cart::all()->where('user_id', Auth::id())->where('user_ip', request()->ip())->sum(function ($t) {
                return $t->price * $t->qty;
            });

            /*stock or outOfStock */
            $old_cartitems = Cart::where('user_id', Auth::id())->get();
            foreach ($old_cartitems as $item) {
                if (!Product::where('id', $item->product_id)->where('product_quantity', '>=', $item->qty)->exists()) 
                {
                    $removeItem = Cart::where('user_id', Auth::id())->where('product_id', $item->product_id)->first();
                    $removeItem->delete();
                }
            }

            return view('frontend.checkout', compact('carts', 'subtotal'));
        } else {
            return redirect()->route('login');
        }
    }
}
