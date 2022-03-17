<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;//for delete image


class ProductController extends Controller
{
   
    // --------------------- add product ------------------ 
    public function add_product(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.product.add',compact('categories','brands'));
    }

    // ===================== store products ================== 
    public function store(Request $request){

        $products=new Product;

        if($request->hasFile('image_one'))
        {
            $file= $request->file('image_one');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('img_DB/product/image_one/',$filename);
            $products->image_one = $filename;
        }
        if($request->hasFile('image_two'))
        {
            $file= $request->file('image_two');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('img_DB/product/image_two/',$filename);
            $products->image_two = $filename;
        }
        if($request->hasFile('image_three'))
        {
            $file= $request->file('image_three');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('img_DB/product/image_three/',$filename);
            $products->image_three = $filename;
        }
        if($request->hasFile('image_four'))
        {
            $file= $request->file('image_four');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('img_DB/product/image_four/',$filename);
            $products->image_four = $filename;
        }

        $products->product_name=$request->product_name;
        $products->product_code=$request->product_code;
        $products->price=$request->price;
        $products->product_quantity=$request->product_quantity;
        $products->category_id=$request->category_id;
        $products->brand_id=$request->brand_id;
        $products->description=$request->description;
        //$products->product_slug=$request->product_slug;
        $products->product_slug = str_replace(' ', '_', $request-> product_slug);
       
        $products->save();
        return Redirect('admin_products_manage')->with('success','Product Added Successfully');

    }


       // ======================== manage products ======================== 
       public function manage_product(){
         $products = Product::latest()->paginate(10);
        //or===$products = Product::orderBy('id','DESC')->get();
        return view('admin.product.manage',compact('products'));
    }

    // ======================== edit product =========== 
    public function edit($id){
        //if findORFail use, do not show error
        $product = Product::findOrFail($id);
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.product.edit',compact('product','categories','brands'));
    }


    // ======================== update data =========================== 
    public function update(Request $request,$id){

        $products= Product::find($id);

        if($request->hasFile('image_one'))
        {
            $path ='img_DB/product/image_one/'.$products->image_one;
            if(File::exists($path))//avobe import class
            {
                File::delete($path);
            }
            $file= $request->file('image_one');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('img_DB/product/image_one/',$filename);
            $products->image_one = $filename;
        }
        if($request->hasFile('image_two'))
        {
            $path ='img_DB/product/image_two/'.$products->image_two;
            if(File::exists($path))//avobe import class
            {
                File::delete($path);
            }
            $file= $request->file('image_two');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('img_DB/product/image_two/',$filename);
            $products->image_two = $filename;
        }
        if($request->hasFile('image_three'))
        {
            $path ='img_DB/product/image_three/'.$products->image_three;
            if(File::exists($path))//avobe import class
            {
                File::delete($path);
            }
            $file= $request->file('image_three');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('img_DB/product/image_three/',$filename);
            $products->image_three = $filename;
        }
        if($request->hasFile('image_four'))
        {
            $path ='img_DB/product/image_four/'.$products->image_four;
            if(File::exists($path))//avobe import class
            {
                File::delete($path);
            }
            $file= $request->file('image_four');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('img_DB/product/image_four/',$filename);
            $products->image_four = $filename;
        }

        $products->product_name=$request->product_name;
        $products->product_code=$request->product_code;
        $products->price=$request->price;
        $products->product_quantity=$request->product_quantity;
        $products->category_id=$request->category_id;
        $products->brand_id=$request->brand_id;
        $products->description=$request->description;
        $products->product_slug = str_replace(' ', '_', $request-> product_slug);
       
        $products->update();
        return Redirect('admin_products_manage')->with('success','Product Update Successfully');
    }


      // ============= delete product ============= 
      public function Delete ($id)
      {
        $products = Product::findOrFail($id);

        if($products -> image_one)
        {
            $path ='img_DB/product/image_one/'.$products->image_one;
            if(File::exists($path))//avobe import class
            {
                File::delete($path);
            }
        }
        if($products -> image_two)
        {
            $path ='img_DB/product/image_two/'.$products->image_two;
            if(File::exists($path))//avobe import class
            {
                File::delete($path);
            }
        }
        if($products -> image_three)
        {
            $path ='img_DB/product/image_three/'.$products->image_three;
            if(File::exists($path))//avobe import class
            {
                File::delete($path);
            }
        }
        if($products -> image_four)
        {
            $path ='img_DB/product/image_four/'.$products->image_four;
            if(File::exists($path))//avobe import class
            {
                File::delete($path);
            }
        }

        $products->delete();
        return Redirect()->back()->with('delete','Product Successfully Deleted');
    }

    // status inactive 
    public function Inactive($id){
        Product::findOrFail($id)->update(['status' => 0]);
        return Redirect()->back()->with('status_inactive','Product Inactive');
    }

    
    // status active 
    public function Active($id){
        Product::findOrFail($id)->update(['status' => 1]);
        return Redirect()->back()->with('status','Product Activated');
    }

     //searching product
     public function product_search(Request $request)
     {
         $products = Product::
         where('product_name','like','%'.$request->search.'%')
         ->orWhere('product_quantity','like','%'.$request->search.'%')
         ->orWhere('description','like','%'.$request->search.'%')
         ->orWhere('price','like','%'.$request->search.'%')
         ->paginate(10);
         return view('admin.product.manage',compact('products'));
     }
}
