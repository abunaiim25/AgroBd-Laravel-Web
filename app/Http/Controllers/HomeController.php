<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // after login -> user & admin
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')// 0=>Frontend dashboard home
            {
                $products = Product::where('status',1)->latest()->get();
                //$lts_p = Product::where('status',1)->latest()->limit(3)->get();
                $products_old = Product::where('status',1)->paginate(8);
                $categories = Category::where('status',1)->latest()->get();
                return view('frontend.index',compact('products','categories','products_old'));
            }else
            {
            // =================== Order ==========================
                $orders = Order::where('status',0)->latest()->paginate(10);
                return view('admin.order.index',compact('orders'));
            }
        }
        else
        {
            return redirect()->back();
        }
        
    }


    


    
public function index()
{
       $products = Product::where('status',1)->latest()->get();
        //$lts_p = Product::where('status',1)->latest()->limit(3)->get();
        $products_old = Product::where('status',1)->paginate(8);
        $categories = Category::where('status',1)->latest()->get();
    return view('frontend.index',compact('products','categories','products_old'));
}

}


