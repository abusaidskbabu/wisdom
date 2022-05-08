<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\ServiceInformation;
use App\Job;
use File;
use DB;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        //return $services;
        return view('backend.career.index', compact('jobs'))->with('title', 'Career');
    }
    public function create()
    {
        return view('backend.career.create')->with('title', 'Create Job');
    }
    public function insert(Request $request)
    {
        //return $request;
        $this->validate($request,
        [
            'title' => 'required',
            'date' => 'required',
            'description' => 'required',
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
        $insert = Job::create([
            'title'=>$request->title,
            'date'=>$request->date,
            'description'=>$request->description,
            'image'=>$path,
            'status'=>$request->status ?? 0,
        ]);
        return redirect()->route('career.create')->withToastSuccess('Career Created Successfully!');
    }
    public function view($id)
    {
        try {
            $job = Job::findOrFail($id);
            //return $service;
            return view('backend.career.view', compact('job'))->with('title', 'View Job');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        try {
            $data = Job::findOrFail($id);
            //return $data;
            return view('backend.career.edit', compact('data'))->with('title', 'Edit Job');
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
            'date' => 'required',
            'description' => 'required',
            'banner' => 'max:1096'

        ],
            $messages = [
                'required' => 'The :attribute field is required.',
                'mimes' => 'Only jpeg, png, bmp,tiff are allowed.'
            ]
        );

       $job =  Job::findOrFail($id);
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

        $job->title = $request->title;
        $job->description = $request->description;
        $job->date = $request->date;
        $job->image = $ban;
        $job->status = $request->status ?? 0;
        $job->save();

       return redirect()->route('career.index')->withToastSuccess('Job Edited Successfully!');
    }
    public function delete($id)
    {
        $data = Job::findOrFail($id);
        if(File::exists($data->image)) {
            File::delete($data->image);
        }
        $data->delete();
        toast('Job Deleted!','success');
    }
}
