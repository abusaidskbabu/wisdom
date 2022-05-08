<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use File;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        //return $services;
        return view('backend.our services.index', compact('services'))->with('title', 'Services');
    }
    public function create()
    {
        return view('backend.our services.create')->with('title', 'Services');
    }
    public function insert(Request $request)
    {
        //return $request;
        $this->validate($request,
        [
            'name' => 'required',
            'wallpaper' => 'required|max:1096',
            'banner' => 'required|max:1096'

        ],
            $messages = [
                'required' => 'The :attribute field is required.',
                'mimes' => 'Only jpeg, png, bmp,tiff are allowed.'
            ]
        );

        if($request->hasFile('wallpaper')){
            $wallpaper = $request->file('wallpaper');
            $wallpapername = uniqid().$wallpaper->getClientOriginalName();
            $wallpaper->move('home', $wallpapername);
        }
        if($request->hasFile('banner')){
            $banner = $request->file('banner');
            $bannername = uniqid().$banner->getClientOriginalName();
            $banner->move('banner', $bannername);
        }
        $insert = Service::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'wallpaper'=>'home/'.$wallpapername,
            'banner'=>'banner/'.$bannername,
            'status'=>$request->status ?? 0,
        ]);
        return redirect()->route('services.create')->withToastSuccess('Service Created Successfully!');
    }
    public function view($id)
    {
        try {
            $service = Service::findOrFail($id);
            //return $service;
            return view('backend.our services.view', compact('service'))->with('title', 'Edit Service');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        try {
            $data = Service::findOrFail($id);
            //return $data;
            return view('backend.our services.edit', compact('data'))->with('title', 'Edit Service');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
    public function update(Request $request, $id)
    {
        //return $request;
        $this->validate($request,
        [
            'name' => 'required',
            'wallpaper' => 'max:1096',
            'banner' => 'max:1096'
        ],
            $messages = [
                'required' => 'The :attribute field is required.',
                'mimes' => 'Only jpeg, png, bmp,tiff are allowed.'
            ]
        );

       $service =  Service::findOrFail($id);
       $wall="";
       $ban="";

       if ($request->hasFile('wallpaper')) 
       {
        $wallpaper_path =  $request->prev_wallpaper;
        
        if(File::exists($wallpaper_path)) {
            File::delete($wallpaper_path);
        }
        $wallpaper = $request->file('wallpaper');
        $wallpapername = uniqid().$wallpaper->getClientOriginalName();
        $wallpaper->move('home', $wallpapername);
        $wall = 'home/'.$wallpapername;
       }
       else{
           $wall = $request->prev_wallpaper;
       }

       if ($request->hasFile('banner')) 
       {
        $banner_path =  $request->prev_banner;
        
        if(File::exists($banner_path)) {
            File::delete($banner_path);
        }
        $banner = $request->file('banner');
        $bannername = uniqid().$banner->getClientOriginalName();
        $banner->move('banner', $bannername);
        $ban = 'banner/'.$bannername;
       }
       else{
        $ban = $request->prev_banner;
       }

        $service->name = $request->name;
        $service->description = $request->description;
        $service->wallpaper = $wall;
        $service->banner = $ban;
        $service->status = $request->status ?? 0;
        $service->save();

       return redirect()->route('services.index')->withToastSuccess('Service Edited Successfully!');
    }
    public function delete($id)
    {
        $data = Service::findOrFail($id);
        if(File::exists($data->wallpaper)) {
            File::delete($data->wallpaper);
        }
        if(File::exists($data->banner)) {
            File::delete($data->banner);
        }
        $data->delete();
        toast('Service Deleted!','success');
    }
}
