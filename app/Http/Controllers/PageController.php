<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\ServiceInformation;
use App\Job;
use App\Request as Req;
use App\Cms;
use File;
use DB;

class PageController extends Controller
{
    public function index($slug)
    {
        $pages  = DB::table('cms')
                ->where('slug', '=', $slug)
                ->where('status', '=', 1)
                ->get();
        //return count($pages);
        if (count($pages) == 0) {
            if ($slug == 'dashboard') {
                if (auth()->user() == null) {
                    return redirect()->route('login');
                } else {
                    return view('backend.dashboard')->with('title', 'Dashboard');
                }
            }
            elseif ($slug == 'our-services') {
                $data = Service::all()->where('status' , 1);
                return view('frontend.services', compact('data'))->with('title', 'Our Services');
            }
            elseif ($slug == 'contact') {
                return view('frontend.contact')->with('title', 'Contact Us');
            }
            elseif ($slug == 'clients') {
                return view('frontend.clients')->with('title', 'Clients');
            }
            elseif ($slug == 'disclaimer') {
                return view('frontend.disclaimer')->with('title', 'Disclaimer');
            }

            elseif ($slug == 'career') {
                $data = Job::all()->where('status' , 1);
                return view('frontend.career', compact('data'))->with('title', 'Career');
            }

            else {
                return view('frontend.404')->with('title', '404 Page Not Found');
            }
        }
        else
        {
            foreach ($pages as $page) {
                if ($page->slug == $slug) {
                    //dd($page);
                    return view('frontend.app', compact('page'))->with('title', $page->title);     
                }
            }
        }
    }
    public function root()
    {
        $data = Service::all()->where('status', 1);
        return view('frontend.home', compact('data'))->with('title', 'Home');
    }
    public function viewServices($id)
    {
        try {
            $title = Service::findOrFail($id);
        } catch (\Throwable $th) {
            return view('frontend.404')->with('title', '404 Page Not Found');
        }
        $data = DB::table('service_information')
                ->where('parent', $id)
                ->where('status', 1)
                ->get();
        return view('frontend.services_view', compact('data'))->with('title', $title->name)->with('info', $title);
    }
    public function apply($id)
    {
        try {
            $data = Job::findOrFail($id);
            return view('frontend.career_apply', compact('data'))->with('title', $data->title);
        } catch (\Throwable $th) {
            return view('frontend.404')->with('title', '404 Page Not Found');
        }
    }
    public function post(Request $request, $id)
    {
        //dd($request->file('resume'));
        $this->validate($request,
        [
            'first_name' => 'required',
            'last_name' => 'required',
            'email_address' => 'required',
            'phone_number' => 'required',
            'cover_letter' => 'required',
            'resume' => 'required'

        ],
            $messages = [
                'required' => 'The :attribute field is required.',
                'mimes' => 'Only pdf, doc and docx are allowed.'
            ]
        );

        if($request->file('resume')){
            $resume = $request->file('resume');
            $resumename = uniqid().$resume->getClientOriginalName();
            $resume->move('resume', $resumename);
        }
        $insert = Req::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email_address,
            'phone'=>'0'.$request->phone_number,
            'resume'=>'resume/'.$resumename,
            'letter'=>'0'.$request->cover_letter,
            'job_id'=>$id
        ]);
        return redirect()->back()->with('success', 'Thanks For Applying !!!');
    }
    public function postContact(Request $request)
    {
        //return $request;
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]      
    );
    return redirect()->back()->with('success', 'Thanks For Reaching Out !!!');
    }
}
