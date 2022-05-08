<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\ServiceInformation;
use File;
use DB;

class ServiceInformationController extends Controller
{
    public function index()
    {
        $services = DB::table('service_information')
            ->join('services', 'services.id', '=', 'service_information.parent')
            ->select('services.name as ser_name','service_information.name','service_information.id','service_information.icon','service_information.image','service_information.status')
            ->get();
        //return $services;
        return view('backend.services information.index', compact('services'))->with('title', 'Services Information');
    }
    public function create()
    {
        $data = Service::all()->where('status', 1);
        return view('backend.services information.create', compact('data'))->with('title', 'Services');
    }
    public function insert(Request $request)
    {
        //return $request;
        $this->validate($request,
        [
            'name' => 'required',
            'category' => 'required|not_in:null',
            'image' => 'required|max:1096',

        ],
            $messages = [
                'required' => 'The :attribute field is required.',
                'mimes' => 'Only jpeg, png, bmp,tiff are allowed.'
            ]
        );

        $ico = "";
        if($request->hasFile('icon')){
            $icon = $request->file('icon');
            $iconname = uniqid().$icon->getClientOriginalName();
            $icon->move('uploads', $iconname);
            $ico = 'uploads/'.$iconname;
        }
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imagename = uniqid().$image->getClientOriginalName();
            $image->move('uploads', $imagename);
        }
        $insert = ServiceInformation::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'parent'=>$request->category,
            'icon'=>$ico,
            'image'=>'uploads/'.$imagename,
            'status'=>$request->status ?? 0,
        ]);
        return redirect()->route('services.information.create')->withToastSuccess('Service Information Created Successfully!');
    }
    public function view($id)
    {
        //return $id;
        try {
            $service = DB::table('service_information')
            ->join('services', 'services.id', '=', 'service_information.parent')
            ->select('services.name as ser_name','service_information.name','service_information.description','service_information.icon','service_information.image','service_information.status')
            ->where('service_information.id', '=', $id)
            ->first();
            //dd($service);
            return view('backend.services information.view', compact('service'))->with('title', 'View Service Information');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        try {
            $data = DB::table('service_information')
            ->join('services', 'services.id', '=', 'service_information.parent')
            ->select('services.name as ser_name','service_information.name','service_information.description','service_information.icon','service_information.image','service_information.status','service_information.parent')
            ->where('service_information.id', '=', $id)
            ->first();
            //dd($data);
            $service = Service::all();
            return view('backend.services information.edit')
            ->with('title', 'Edit Services Information')
            ->with('data', $data)
            ->with('service', $service);
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
            'category' => 'required|not_in:null',
            'image' => 'max:1096',
        ],
            $messages = [
                'required' => 'The :attribute field is required.',
                'mimes' => 'Only jpeg, png, bmp,tiff are allowed.'
            ]
        );

       $service =  ServiceInformation::findOrFail($id);
       $ico="";
       $img="";

       if ($request->hasFile('icon')) 
       {
        $icon_path =  $request->prev_icon;
        
        if(File::exists($icon_path)) {
            File::delete($icon_path);
        }
        $icon = $request->file('icon');
        $iconname = uniqid().$icon->getClientOriginalName();
        $icon->move('uploads', $iconname);
        $ico = 'uploads/'.$iconname;
       }
       else{
           $ico = $request->prev_icon;
       }

       if ($request->hasFile('image')) 
       {
        $image_path =  $request->prev_image;
        
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $image = $request->file('image');
        $imagename = uniqid().$image->getClientOriginalName();
        $image->move('uploads', $imagename);
        $img = 'uploads/'.$imagename;
       }
       else{
        $img = $request->prev_image;
       }

        $service->name = $request->name;
        $service->description = $request->description;
        $service->icon = $ico;
        $service->image = $img;
        $service->parent = $request->category;
        $service->status = $request->status ?? 0;
        $service->save();

       return redirect()->route('services.information.index')->withToastSuccess('Service Information Edited Successfully!');
    }
    public function delete($id)
    {
        $data = ServiceInformation::findOrFail($id);
        if(File::exists($data->icon)) {
            File::delete($data->icon);
        }
        if(File::exists($data->image)) {
            File::delete($data->image);
        }
        $data->delete();
        toast('Service Information Deleted!','success');
    }
}
