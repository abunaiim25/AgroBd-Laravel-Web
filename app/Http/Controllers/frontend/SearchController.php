<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Business\MyBusiness;
use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //searching search_product_item
    public function search_product_item(Request $request)
    {
        $request->validate([
            'query' => 'required',
        ]);

        $query = $request->input('query');
        //dd($query); //for see

        $products = Product::where('product_name', 'like', "%$query%")
            ->orWhere('product_code', 'like', "%$query%")
            ->orWhere('product_quantity', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->orWhere('price', 'like', "%$query%")
            ->paginate(10);
        //dd($doctor);
        return view('frontend.search.product_search', compact('products'));
    }


    //searching search_news_query
    public function search_news_query(Request $request)
    {
        $request->validate([
            'query' => 'required',
        ]);

        $query = $request->input('query');
        //dd($query); //for see

        $news = News::where('title', 'like', "%$query%")
            ->orWhere('category', 'like', "%$query%")
            ->orWhere('place', 'like', "%$query%")
            ->orWhere('writer_name', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->paginate(10);
        //dd($doctor);
        return view('frontend.search.news_search', compact('news'));
    }

    //search_business_query
    public function search_business_query(Request $request)
    {
        $request->validate([
            'query' => 'required',
        ]);

        $query = $request->input('query');
        //dd($query); //for see

        $business = MyBusiness::where('category', 'like', "%$query%")
            ->orWhere('product_name', 'like', "%$query%")
            ->orWhere('product_quantity', 'like', "%$query%")
            ->orWhere('product_description', 'like', "%$query%")
            ->orWhere('price', 'like', "%$query%")
            ->orWhere('phone', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->orWhere('village', 'like', "%$query%")
            ->orWhere('road', 'like', "%$query%")
            ->orWhere('district', 'like', "%$query%")
            ->orWhere('police_station', 'like', "%$query%")
            ->orWhere('post_office', 'like', "%$query%")
            ->orWhere('country', 'like', "%$query%")
            ->orWhere('post_code', 'like', "%$query%")
            ->orWhere('personal_description', 'like', "%$query%")
            ->paginate(10);
        //dd($doctor);
        return view('frontend.search.business_product_search', compact('business'));
    }
}
