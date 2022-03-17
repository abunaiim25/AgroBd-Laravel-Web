<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Team;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about_page()
    {
        $about = About::first();
        $team = Team::get();
        return view('frontend.about',compact('about','team'));
    }

 
}
