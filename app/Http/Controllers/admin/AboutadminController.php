<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; //for delete image

class AboutadminController extends Controller
{

    //============about us===============
    public function admin_descriptoon_add()
    {
        $about = About::first();
        return view('admin.about.description_add', compact('about'));
    }


    public function admin_about_store_description(Request $request)
    {
        $this->validate($request, [
            'about_description' => 'required',
        ]);

        $about = About::first();
        if ($about == NULL) {
            $about = new About;
        } else {
            $about = About::first();
        }
        //$about = About::first();
        //$about=new About;
        $about->about_description = $request->about_description;
        $about->about_description_readmore = $request->about_description_readmore;
        $about->save();
        return Redirect()->back()->with('status', " 'About Us' Description Updated Successfully");
    }


    //==================team=========================

    public function admin_team_add()
    {
        $team = Team::get();
        return view('admin.about.team_add', compact('team'));
    }

    public function admin_team_store(Request $request)
    {

        $team = new Team;

        if ($request->hasFile('team_img')) {
            $file = $request->file('team_img');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('img_DB/team_img/', $filename);
            $team->team_img = $filename;
        }

        $team->team_name = $request->team_name;
        $team->team_designation = $request->team_designation;
        $team->team_txt = $request->team_txt;
        $team->team_email = $request->team_email;

        $team->save();
        return Redirect('admin_team_manage')->with('success', 'Our Team Added Successfully');
    }


    // ======================== manage  ======================== 
    public function admin_team_manage()
    {
        $team = Team::paginate(10);
        return view('admin.about.team_manage', compact('team'));
    }

    // ======================== edit  =========== 
    public function admin_team_edit($id)
    {
        //if findORFail use, do not show error
        $team = Team::findOrFail($id);
        return view('admin.about.team_edit', compact('team'));
    }

    //============admin_team_update===============

    public function admin_team_update(Request $request, $id)
    {

        $team = Team::find($id);

        if ($request->hasFile('team_img')) {
            $path = 'img_DB/team_img/' . $team->team_img;
            if (File::exists($path)) //avobe import class
            {
                File::delete($path);
            }
            $file = $request->file('team_img');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('img_DB/team_img/', $filename);
            $team->team_img = $filename;
        }

        $team->team_name = $request->team_name;
        $team->team_designation = $request->team_designation;
        $team->team_txt = $request->team_txt;
        $team->team_email = $request->team_email;

        $team->update();
        return Redirect('admin_team_manage')->with('success', 'Our Team Update Successfully');
    }

    //=============admin_team_delete===================
    public function admin_team_delete($id)
    {

        $team = Team::findOrFail($id);

        if ($team->team_img) {
            $path = 'img_DB/team_img/' . $team->team_img;
            if (File::exists($path)) //avobe import class
            {
                File::delete($path);
            }
        }
        $team->delete();
        return Redirect()->back()->with('delete', 'Product Successfully Deleted');
    }


         //searching team
         public function team_person_search(Request $request)
         {
             $team = Team::
             where('team_name','like','%'.$request->search.'%')
             ->orWhere('team_designation','like','%'.$request->search.'%')
             ->orWhere('team_txt','like','%'.$request->search.'%')
             ->orWhere('team_email','like','%'.$request->search.'%')
             ->paginate(10);
             return view('admin.about.team_manage',compact('team'));
         }
}
