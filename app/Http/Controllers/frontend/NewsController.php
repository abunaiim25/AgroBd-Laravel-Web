<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news_page()
    {
        $news = News::latest()->paginate(6);
        $news_old = News::take(3)->get();
        return view('frontend.news.index',compact('news','news_old'));
    }

    public function news_details($id)
    {
        $news = News::find($id);
        $latest_news = News::latest()->take(4)->get();
        return view('frontend.news.news_details',compact('news','latest_news'));
    }
}
