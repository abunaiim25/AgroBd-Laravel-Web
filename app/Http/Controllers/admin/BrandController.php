<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BrandController extends Controller
{
     // ======= index page =======
     public function index(){
        $brands = Brand::latest()->paginate(10);
        return view('admin.brand.index',compact('brands'));
    }

    // ============ store brand ========= 
    public function store(Request $request){
        $request->validate([
            'brand_name' => 'required|unique:brands,brand_name'
        ]);
        
       
        Brand::insert([
            'brand_name' => $request->brand_name,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success','Brand Added Successfully');
    }

    // =============== edit data  ========== 
    public function edit($id){
        $brand = Brand::find($id);
        return view('admin.brand.edit',compact('brand'));
    }

    public function update(Request $request){
        $request->validate([
            'brand_name' => 'required'
        ]);
        $brand_id = $request->id;
       
        Brand::find($brand_id)->update([
            'brand_name' => $request->brand_name,
            'updated_at' => Carbon::now()
        ]);

        return Redirect('admin_brand')->with('success','Brand Updated Successfully');
    }

    
    // Delete Brand 
    public function Delete($brand_id){
        Brand::find($brand_id)->delete();
        return Redirect()->back()->with('delete','Brand Deleted Success');
    }


    // status inactive 
    public function Inactive($brand_id){
        Brand::find($brand_id)->update(['status' => 0]);
        return Redirect()->back()->with('Catupdated','Brand inactive');
    }

    
    // status active 
    public function Active($brand_id){
        Brand::find($brand_id)->update(['status' => 1]);
        return Redirect()->back()->with('Catupdated','Brand Activated');
    }


     //searching catagory
     public function brand_search(Request $request)
     {
         $brands = Brand::
         where('brand_name','like','%'.$request->search.'%')
         ->paginate(10);
         return view('admin.brand.index',compact('brands'));
     }

}
