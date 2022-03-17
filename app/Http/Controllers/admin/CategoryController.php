<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        //$categories = Category::latest()->simplePaginate(2);
        $categories = Category::latest()->paginate(10);
       // $categories = Category::latest()->paginate(4)->withQueryString();
        return view('admin.category.index',compact('categories'));
    }


     // ============ store category ========= 
    public function Store(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories,category_name'
        ]);
        
       
        Category::insert([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success','Category Added Successfully');
    }


     // ========= edit category data 
     public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request){      
        $cat_id = $request->id;

        Category::find($cat_id)->update([
            'category_name' => $request->category_name,
            'updated_at' => Carbon::now()
        ]);

        return Redirect('admin_category')->with('Catupdated','Category Updated Successfully');
    }

    // Delete category 
    public function Delete($id){
        Category::find($id)->delete();
        return Redirect()->back()->with('delete','Category Deleted Success');
    }


    // status inactive 
    public function Inactive($id){
        Category::find($id)->update(['status' => 0]);
        return Redirect()->back()->with('Catupdated','Category Inactive');
    }

    
    // status active 
    public function Active($id){
        Category::find($id)->update(['status' => 1]);
        return Redirect()->back()->with('Catupdated','Category Activated');
    }

     //searching catagory
     public function category_search(Request $request)
     {
         $categories = Category::
         where('category_name','like','%'.$request->search.'%')
         ->paginate(10);
         return view('admin.category.index',compact('categories'));
     }
}
