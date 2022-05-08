<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\ServiceInformation;
use App\Job;
use App\Request as Req;
use File;
use DB;

class RequestController extends Controller
{
    public function index()
    {
        $data = DB::table('requests')
            ->join('jobs', 'jobs.id', '=', 'requests.job_id')
            ->select('jobs.title as job_title','jobs.id as job_id','requests.*')
            ->get();
        //return $data;
        return view('backend.request.index', compact('data'))->with('title', 'Career Requests');
    }
    public function view($id)
    {
        try {
            $data = DB::table('requests')
            ->join('jobs', 'jobs.id', '=', 'requests.job_id')
            ->select('jobs.title as job_title','jobs.id as job_id','requests.*')
            ->where('requests.id', '=', $id)
            ->first();
            //dd($data);
            //return $service;
            return view('backend.request.view', compact('data'))->with('title', 'View Job Request');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
    public function delete($id)
    {
        $data = Req::findOrFail($id);
        if(File::exists($data->resume)) {
            File::delete($data->resume);
        }
        $data->delete();
        toast('Request Deleted!','success');
    }
}
