<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;//for delete image

class NewsadminController extends Controller
{
    public function admin_news_add()
    {
        return view('admin.news.index');
    }


    public function admin_store_news(Request $request)
    {
        $news=new News();

        if($request->hasFile('image'))
        {
            $file= $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('img_DB/news/',$filename);
            $news->image = $filename;
        }

        $news->title=$request->title;
        $news->category=$request->category;
        $news->place=$request->place;
        $news->writer_name=$request->writer_name;
        $news->description=$request->description;
        //$news = Carbon::now();

        $news->save();
        return redirect('admin_news_manage')->with('success','News Added Successfully');
        //return redirect()->back();
    }

    public function admin_news_manage()
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.manage',compact('news'));
    }

    public function edit_news($id)
    {
        $news = News::find($id);
        return view('admin.news.edit_news',compact('news'));
    }


    public function news_edit_update(Request $request,$id)
    {
       $news=News::find($id);
      
       if($request->hasFile('image'))
       {
        $path ='img_DB/news/'.$news->image;
        if(File::exists($path))//avobe import class
        {
            File::delete($path);
        }
           $file= $request->file('image');
           $ext = $file->getClientOriginalExtension();
           $filename = time().'.'.$ext;
           $file->move('img_DB/news/',$filename);
           $news->image = $filename;
       }

       $news->title=$request->title;
       $news->category=$request->category;
       $news->place=$request->place;
       $news->writer_name=$request->writer_name;
       $news->description=$request->description;

        $news->update();
        return redirect('admin_news_manage')->with('success','News Updated Successfully');
    }


    //delete
   public function delete_news($id)
   {
    $news = News::findOrFail($id);

    if($news -> image)
    {
        $path ='img_DB/news/'.$news->image;
        if(File::exists($path))//avobe import class
        {
            File::delete($path);
        }
    }
    $news->delete();

    return Redirect()->back()->with('delete','News Deleted');
   }

    //searching discount
    public function news_search(Request $request)
    {
        $news = News::
        where('title','like','%'.$request->search.'%')
        ->orWhere('category','like','%'.$request->search.'%')
        ->orWhere('place','like','%'.$request->search.'%')
        ->orWhere('writer_name','like','%'.$request->search.'%')
        ->orWhere('description','like','%'.$request->search.'%')
        ->paginate(10);
        return view('admin.news.manage',compact('news'));
    }

}
