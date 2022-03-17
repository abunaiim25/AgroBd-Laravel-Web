<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function contact()
      {
          return view('frontend.contact');
      }

      public function contact_submit(Request $request)
      {
          $data=new Contact();
          
          $data->name= $request->name;
          $data->email= $request->email;
          $data->date= $request->date;
          $data->phone= $request->phone;
          $data->message= $request->message;
          $data->status= 'In Progress';
          if(Auth::id())
          {
              $data->user_id= Auth::user()->id;
          }
  
          $data->save();
          return redirect()->back()->with('status','Contact Submited Successfully. We will contact with you soon.');
      }
  
}
