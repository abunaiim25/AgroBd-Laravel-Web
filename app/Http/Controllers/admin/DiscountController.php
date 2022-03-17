<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index(){
        $discount = Discount::latest()->paginate(10);
        return view('admin.discount.index',compact('discount'));
    }

    //    ============= discount store =========
   public function store(Request $request){

    $discount=new Discount();
    $discount->discount_name=$request->discount_name;
    $discount->discount_persent=$request->discount_persent;
    $discount->save();

       return Redirect()->back()->with('success','Discount added');
   }


   //===================edit===============================
   public function edit($id){
       $discount = Discount::findOrFail($id);
       return view('admin.discount.edit',compact('discount'));
   }


   //====================update==========================
   public function update(Request $request,$id){

    $discount= Discount::find($id);
    $discount->discount_name=$request->discount_name;
    $discount->discount_persent=$request->discount_persent;
    $discount->update();

       return Redirect('admin_discount')->with('Catupdated','Discount Updated');
   }


//delete
   public function Delete($id){
    Discount::findOrFail($id)->delete();
       return Redirect()->back()->with('delete','Discount Deleted');
   }


    // status inactive
    public function Inactive($id){
        Discount::find($id)->update(['status' => 0]);
        return Redirect()->back()->with('status_inactive','Discount inactive');
    }


    // status inactive
    public function Active($id){
        Discount::find($id)->update(['status' => 1]);
        return Redirect()->back()->with('status','Discount Activated');
    }


       //searching discount
       public function discount_search(Request $request)
       {
           $discount = Discount::
           where('discount_name','like','%'.$request->search.'%')
           ->orWhere('discount_persent','like','%'.$request->search.'%')
           ->paginate(10);
           return view('admin.discount.index',compact('discount'));
       }
}
