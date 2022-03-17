<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function reviewadd($id)
    {
        $product = Product::find($id);
        return view('frontend.review.review', compact('product'));
    }


    public function reviewcreate(Request $request)
    {
        $product_id = $request->input('product_id');
        $user_review = $request->input('user_review');
        $new_review = Review::create([
            'user_id' => Auth::id(),
            'prod_id' => $product_id,
            'user_review' => $user_review
        ]);

        $product = Product::where('id', $product_id)->where('status', '1')->first();
        $id = $product->id;
        if ($new_review) {
            return redirect('product_details/' . $id)->with('status', "Thank you for writing a review");
            //return redirect()->to('add-review/'.$product_id)->with('status', "Thank you for writing a review");
        }
    }



    public function editreview($id)
    {
        $review = Review::find($id);
        return view('frontend.review.edit', compact('review'));
    }


    public function update(Request $request, $id)
    {
        $review = Review::find($id);
        $review->user_review = $request->user_review;
        $review->update();

        $product_id = $request->product_id;
        $product = Product::where('id', $product_id)->where('status', '1')->first();
        return redirect('product_details/' . $product->id)->with('status', "Your review updated");
    }


    public function Delete($id)
    {
        Review::find($id)->delete();
        return Redirect()->back()->with('status', 'Review Deleted Successfully');
    }

    
    public function review_more($id)
    {
        $products = Product::findOrFail($id);
        $review = Review::where('prod_id', $products->id)->latest()->paginate(10);
        return view('frontend.review.more_review', compact('review', 'products'));
    }
}
