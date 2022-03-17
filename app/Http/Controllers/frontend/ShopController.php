<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
   public function shop_page()
   {
      $products = Product::where('status', 1)->latest()->paginate(16);
      return view('frontend.shop', compact('products'));
   }


   //===========product_details_page=================
   public function product_details_page($id)
   {
      $products = Product::findOrFail($id);
      $lt_products = Product::where('status', 1)->latest()->get();
      //$qty_product = Product::findOrFail($id)->decrement('product_quantity');

      //ratting
      $ratings = Rating::where('prod_id', $products->id)->get();
      $rating_sum = Rating::where('prod_id', $products->id)->sum('stars_rated');
      $user_rating = Rating::where('prod_id', $products->id)->where('user_id', Auth::id())->first();
      //review 
      $reviews = Review::where('prod_id', $products->id)->latest()->take(3)->get();
      //ratting
      if ($ratings->count() > 0) {
         $rating_value = $rating_sum / $ratings->count();
      } else {
         $rating_value = 0; //rating 0
      }

      return view('frontend.product_details', compact('products', 'lt_products', 'ratings', 'rating_sum', 'user_rating', 'rating_value', 'reviews'));
   }


   //===========product_details_page=================
   public function category_product_show_page($id)
   {
      $products = Product::where('category_id', $id)->latest()->paginate(9);
      return view('frontend.category_product', compact('products'));
   }
   
}
