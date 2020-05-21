<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $profile=Profile::where('user_id',Auth::user()['id'])->first();
        return view('profile.profile', ['profile' => $profile]);
    }
    public function update(Request $request)
    {
        $input=$request->except('_token');
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $input['image'] = $file->getClientOriginalName();
            $file->move(public_path().'/storage/img',$input['image']);
        }
        $profile = Profile::where('user_id',Auth::user()['id'])->first();
        if($request -> hasFile('image')) {
            $profile -> image = $input['image'];
        }
        $profile -> fio= $input['fio'];
        $profile -> birthdate= $input['birthdate'];
        $profile -> save();
        return view('home');


    }
}
