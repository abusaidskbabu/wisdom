<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /** =
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.dashboard')->with('title', 'Dashboard');
    } 
    public function profile()
    {
        $data = User::all()->where('id', auth()->user()->id)->first();
        //return $data;
        return view('backend.profile.view', compact('data'))->with('title', 'User Profile');
    } 
    public function editProfile()
    {
        $data = User::all()->where('id', auth()->user()->id)->first();
        //return $data;
        return view('backend.profile.edit', compact('data'))->with('title', 'Edit Profile');
    }
    public function updateProfile(Request $request)
    {
        //return $request;
        $this->validate($request,
        [
            'name' => 'required',
            'avatar' => 'max:1096'

        ],
            $messages = [
                'required' => 'The :attribute field is required.',
                'mimes' => 'Only jpeg, png, bmp,tiff are allowed.'
            ]
        );

       $user =  User::findOrFail(auth()->user()->id);
       $avtr="";

       if ($request->hasFile('avatar')) 
       {
        $avatar_path =  $request->prev_avatar;
        
        if(File::exists($avatar_path)) {
            File::delete($avatar_path);
        }
        $avatar = $request->file('avatar');
        $avatarname = uniqid().$avatar->getClientOriginalName();
        $avatar->move('uploads', $avatarname);
        $ban = 'uploads/'.$avatarname;
       }
       else{
        $avtr = $request->prev_avatar;
       }

        $user->name = $request->name;
        $user->avatar = $avtr;
        $user->save();
        return redirect()->route('profile')->withToastSuccess('Profile Edited Successfully!');
    }
    public function settings()
    {
        return view('backend.profile.settings')->with('title', 'Settings');
    }
    public function settingsPost(Request $request){
        $this->validate($request,[
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $id = auth()->user()->id;
        $password = User::all()->where('id',$id)->first();

        if(Hash::check($request['current_password'], $password->password))
        {                           
          $obj_user = User::find($id);
          $obj_user->password = Hash::make($request['password']);
          $obj_user->save(); 
          return redirect('dashboard')->with('success','Password Updated!!');
        }
        else{
            return redirect()->back()->with([
                'message' => 'Your Current Password Does Not Match !!!',
            ])->withInput();
        }
    }
}
