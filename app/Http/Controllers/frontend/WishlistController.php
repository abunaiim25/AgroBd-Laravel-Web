<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function add_to_wishlist($id){
       
        if (Auth::check())
         {
            Wishlist::insert([
                'user_id' => Auth::id(),
                'product_id' => $id,
                'updated_at' => Carbon::now()
            ]);
            return Redirect()->back()->with('status','Product added on Wishlist. You should go to Wishlist');
        }else{
            return Redirect()->route('login')->with('status','At First Login Your Account');
        }
    }

    public function wishlist()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->latest()->get();
        return view('frontend.wishlist', compact('wishlist'));
    }


    public function wishlist_destroy($id){
        Wishlist::where('id',$id)->where('user_id',Auth::id())->delete();
        return Redirect()->back()->with('status','Wishlist Product Removed');
    }
    
}
