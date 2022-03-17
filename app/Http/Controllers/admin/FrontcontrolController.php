<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FrontControl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;//for delete image

class FrontcontrolController extends Controller
{
    public function admin_front_control()
    {
        $front = FrontControl::First();
        return view('admin.FrontControl',compact('front'));
    }

    public function front_control_store(Request $request)
    {
        $front = FrontControl::first();
        if($front==NULL)
        {
            $front=new FrontControl;
        }else{
            $front = FrontControl::first();
        }

      /*=======================Logo====================*/
      if($request->hasFile('logo_big'))
      {
          $path ='img_DB/front/logo/'.$front->logo_big;
          if(File::exists($path))//avobe import class
          {
              File::delete($path);
          }
          $file= $request->file('logo_big');
          $ext = $file->getClientOriginalExtension();
          $filename = time().'.'.$ext;
          $file->move('img_DB/front/logo/',$filename);
          $front->logo_big = $filename;
      }
      if($request->hasFile('logo_small'))
      {
          $path ='img_DB/front/home/'.$front->logo_small;
          if(File::exists($path))//avobe import class
          {
              File::delete($path);
          }
          $file= $request->file('logo_small');
          $ext = $file->getClientOriginalExtension();
          $filename = time().'.'.$ext;
          $file->move('img_DB/front/logo/',$filename);
          $front->logo_small = $filename;
      }
      
      /*=======================Home bg====================*/
        $front->home_bg_txt1 = $request->home_bg_txt1;
        $front->home_bg_txt2 = $request->home_bg_txt2;
        $front->home_bg_txt3 = $request->home_bg_txt3;
        if($request->hasFile('home_bg_img'))
        {
            $path ='img_DB/front/home/'.$front->home_bg_img;
            if(File::exists($path))//avobe import class
            {
                File::delete($path);
            }
            $file= $request->file('home_bg_img');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('img_DB/front/home/',$filename);
            $front->home_bg_img = $filename;
        }

        /*=======================Home new====================*/
        if($request->hasFile('home_new_txt1_img'))
        {
            $path ='img_DB/front/new/new1/'.$front->home_new_txt1_img;
            if(File::exists($path))//avobe import class
            {
                File::delete($path);
            }
            $file= $request->file('home_new_txt1_img');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('img_DB/front/new/new1/',$filename);
            $front->home_new_txt1_img = $filename;
        }
        if($request->hasFile('home_new_txt2_img'))
        {
            $path ='img_DB/front/new/new2/'.$front->home_new_txt2_img;
            if(File::exists($path))//avobe import class
            {
                File::delete($path);
            }
            $file= $request->file('home_new_txt2_img');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('img_DB/front/new/new2/',$filename);
            $front->home_new_txt2_img = $filename;
        }
        if($request->hasFile('home_new_txt3_img'))
        {
            $path ='img_DB/front/new/new3/'.$front->home_new_txt3_img;
            if(File::exists($path))//avobe import class
            {
                File::delete($path);
            }
            $file= $request->file('home_new_txt3_img');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('img_DB/front/new/new3/',$filename);
            $front->home_new_txt3_img = $filename;
        }
        

        /*=======================Home Banner====================*/
        $front->home_banner_txt1 = $request->home_banner_txt1;
        $front->home_banner_txt2 = $request->home_banner_txt2;
        if($request->hasFile('home_banner_img'))
        {
            $path ='img_DB/front/home_banner/'.$front->home_banner_img;
            if(File::exists($path))//avobe import class
            {
                File::delete($path);
            }
            $file= $request->file('home_banner_img');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('img_DB/front/home_banner/',$filename);
            $front->home_banner_img = $filename;
        }


                /*=======================Shop Banner====================*/
                $front->shop_banner_txt1 = $request->shop_banner_txt1;
                $front->shop_banner_txt2 = $request->shop_banner_txt2;
                if($request->hasFile('shop_banner_img'))
                {
                    $path ='img_DB/front/shop_banner/'.$front->shop_banner_img;
                    if(File::exists($path))//avobe import class
                    {
                        File::delete($path);
                    }
                    $file= $request->file('shop_banner_img');
                    $ext = $file->getClientOriginalExtension();
                    $filename = time().'.'.$ext;
                    $file->move('img_DB/front/shop_banner/',$filename);
                    $front->shop_banner_img = $filename;
                }


                 /*=======================about_banner_img====================*/
                 if($request->hasFile('about_banner_img'))
                 {
                     $path ='img_DB/front/about_banner/'.$front->about_banner_img;
                     if(File::exists($path))//avobe import class
                     {
                         File::delete($path);
                     }
                     $file= $request->file('about_banner_img');
                     $ext = $file->getClientOriginalExtension();
                     $filename = time().'.'.$ext;
                     $file->move('img_DB/front/about_banner/',$filename);
                     $front->about_banner_img = $filename;
                 }

                  /*=======================contact_banner_img====================*/
                  if($request->hasFile('contact_banner_img'))
                  {
                      $path ='img_DB/front/contact_banner/'.$front->contact_banner_img;
                      if(File::exists($path))//avobe import class
                      {
                          File::delete($path);
                      }
                      $file= $request->file('contact_banner_img');
                      $ext = $file->getClientOriginalExtension();
                      $filename = time().'.'.$ext;
                      $file->move('img_DB/front/contact_banner/',$filename);
                      $front->contact_banner_img = $filename;
                  }

                   /*=======================My Order Banner====================*/
                $front->myorder_banner_txt1 = $request->myorder_banner_txt1;
                $front->myorder_banner_txt2 = $request->myorder_banner_txt2;
                if($request->hasFile('myorder_banner_img'))
                {
                    $path ='img_DB/front/myorder_banner/'.$front->myorder_banner_img;
                    if(File::exists($path))//avobe import class
                    {
                        File::delete($path);
                    }
                    $file= $request->file('myorder_banner_img');
                    $ext = $file->getClientOriginalExtension();
                    $filename = time().'.'.$ext;
                    $file->move('img_DB/front/myorder_banner/',$filename);
                    $front->myorder_banner_img = $filename;
                }
                 
                 /*=======================Footer====================*/
                 $front->footer_text = $request->footer_text;
                 $front->footer_contact_address = $request->footer_contact_address;
                 $front->footer_contact_phone = $request->footer_contact_phone;
                 $front->footer_contact_email = $request->footer_contact_email;
                 $front->footer_social_fb = $request->footer_social_fb;
                 $front->footer_social_twitter = $request->footer_social_twitter;
                 $front->footer_social_insta = $request->footer_social_insta;
                 $front->footer_social_linkedin = $request->footer_social_linkedin;

                 if($request->hasFile('footer_iteam_img_1'))
                 {
                     $path ='img_DB/front/footer_iteam/item1/'.$front->footer_iteam_img_1;
                     if(File::exists($path))//avobe import class
                     {
                         File::delete($path);
                     }
                     $file= $request->file('footer_iteam_img_1');
                     $ext = $file->getClientOriginalExtension();
                     $filename = time().'.'.$ext;
                     $file->move('img_DB/front/footer_iteam/item1/',$filename);
                     $front->footer_iteam_img_1 = $filename;
                 }
                 if($request->hasFile('footer_iteam_img_2'))
                 {
                     $path ='img_DB/front/footer_iteam/item2/'.$front->footer_iteam_img_2;
                     if(File::exists($path))//avobe import class
                     {
                         File::delete($path);
                     }
                     $file= $request->file('footer_iteam_img_2');
                     $ext = $file->getClientOriginalExtension();
                     $filename = time().'.'.$ext;
                     $file->move('img_DB/front/footer_iteam/item2/',$filename);
                     $front->footer_iteam_img_2 = $filename;
                 }
                 if($request->hasFile('footer_iteam_img_3'))
                 {
                     $path ='img_DB/front/footer_iteam/item3/'.$front->footer_iteam_img_3;
                     if(File::exists($path))//avobe import class
                     {
                         File::delete($path);
                     }
                     $file= $request->file('footer_iteam_img_3');
                     $ext = $file->getClientOriginalExtension();
                     $filename = time().'.'.$ext;
                     $file->move('img_DB/front/footer_iteam/item3/',$filename);
                     $front->footer_iteam_img_3 = $filename;
                 }
                 if($request->hasFile('footer_iteam_img_4'))
                 {
                     $path ='img_DB/front/footer_iteam/item4/'.$front->footer_iteam_img_4;
                     if(File::exists($path))//avobe import class
                     {
                         File::delete($path);
                     }
                     $file= $request->file('footer_iteam_img_4');
                     $ext = $file->getClientOriginalExtension();
                     $filename = time().'.'.$ext;
                     $file->move('img_DB/front/footer_iteam/item4/',$filename);
                     $front->footer_iteam_img_4 = $filename;
                 }
                 if($request->hasFile('footer_iteam_img_5'))
                 {
                     $path ='img_DB/front/footer_iteam/item5/'.$front->footer_iteam_img_5;
                     if(File::exists($path))//avobe import class
                     {
                         File::delete($path);
                     }
                     $file= $request->file('footer_iteam_img_5');
                     $ext = $file->getClientOriginalExtension();
                     $filename = time().'.'.$ext;
                     $file->move('img_DB/front/footer_iteam/item5/',$filename);
                     $front->footer_iteam_img_5 = $filename;
                 }
                 if($request->hasFile('footer_iteam_img_6'))
                 {
                     $path ='img_DB/front/footer_iteam/item6/'.$front->footer_iteam_img_6;
                     if(File::exists($path))//avobe import class
                     {
                         File::delete($path);
                     }
                     $file= $request->file('footer_iteam_img_6');
                     $ext = $file->getClientOriginalExtension();
                     $filename = time().'.'.$ext;
                     $file->move('img_DB/front/footer_iteam/item6/',$filename);
                     $front->footer_iteam_img_6 = $filename;
                 }
        

        $front->save();
        return Redirect()->back()->with('status', "Frontend Design Updated Successfully");
    }
}
