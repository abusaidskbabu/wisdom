<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\ServiceInformation;
use App\Job;
use App\Cms;
use File;
use DB;

class CmsController extends Controller
{
    public function index()
    {
        $data = Cms::all();
        //return $services;
        return view('backend.cms.index', compact('data'))->with('title', 'Page CMS');
    }
    public function create()
    {
        return view('backend.cms.create')->with('title', 'Create Page');
    }
    public function insert(Request $request)
    {
        //return $request;
        $this->validate($request,
        [
            'title' => 'required',
            'slug' => 'required|unique:cms',
            'banner' => 'required|max:1096'

        ],
            $messages = [
                'required' => 'The :attribute field is required.',
                'mimes' => 'Only jpeg, png, bmp,tiff are allowed.'
            ]
        );

        $path = "";
        if($request->hasFile('banner')){
            $banner = $request->file('banner');
            $bannername = uniqid().$banner->getClientOriginalName();
            $banner->move('uploads', $bannername);
            $path = 'uploads/'.$bannername;
        }
        $insert = Cms::create([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'description'=>$request->description,
            'banner'=>$path,
            'status'=>$request->status ?? 0,
        ]);
        return redirect()->route('cms.create')->withToastSuccess('Page Created Successfully!');
    }
    public function view($id)
    {
        try {
            $data = Cms::findOrFail($id);
            //return $data;
            return view('backend.cms.view', compact('data'))->with('title', 'View Page');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        try {
            $data = Cms::findOrFail($id);
            //return $data;
            return view('backend.cms.edit', compact('data'))->with('title', 'Edit Page');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
    public function update(Request $request, $id)
    {
        //return $request;
        $this->validate($request,
        [
            'title' => 'required',
            'slug' => 'required',
            'banner' => 'max:1096'

        ],
            $messages = [
                'required' => 'The :attribute field is required.',
                'mimes' => 'Only jpeg, png, bmp,tiff are allowed.'
            ]
        );

       $data = Cms::findOrFail($id);
       $ban="";

       if ($request->hasFile('banner')) 
       {
        $banner_path =  $request->prev_banner;
        
        if(File::exists($banner_path)) {
            File::delete($banner_path);
        }
        $banner = $request->file('banner');
        $bannername = uniqid().$banner->getClientOriginalName();
        $banner->move('uploads', $bannername);
        $ban = 'uploads/'.$bannername;
       }
       else{
        $ban = $request->prev_banner;
       }

        $data->title = $request->title;
        $data->slug = $request->slug;
        $data->description = $request->description;
        $data->banner = $ban;
        $data->status = $request->status ?? 0;
        $data->save();

        return redirect()->route('cms.index')->withToastSuccess('Page Edited Successfully!');
    }
    public function delete($id)
    {
        $data = Cms::findOrFail($id);
        if(File::exists($data->banner)) {
            File::delete($data->banner);
        }
        $data->delete();
        toast('Page Deleted!','success');
    }
}
