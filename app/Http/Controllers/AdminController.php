<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //index
    public function index(){
        $id = Auth::user()->id;
        $user =  User::find($id);
        return view('backEnd.home.index',compact('user'));
    }
    //profile
    public function profile(){
       $id = Auth::user()->id;
       $user1 =  User::find($id);
        return view('backEnd.admin.profile',compact('user1'));
    }
    //editProfile
    public function editProfile($id){
        $user2 =  User::find($id);
        return view('backEnd.admin.edit-profile',compact('user2'));
    }
    //storeProfile
    public function storeProfile(Request $request){
        $id = Auth::user()->id;
        $user =  User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->file('image')) {
            $user->image = $this->makeImage($request);
        }
        $user->save();
        return redirect('/profile')->with('message','Admin Profile Update Successfully');
    }
    public function makeImage($request){
        $image = $request->file('image');
        $imageName = rand().'.'.$image->getClientOriginalExtension();
        $directory = 'backEndAssets/admin-img/';
        $imageURL = $directory.$imageName;
        $image->move($directory,$imageName);
        return $imageURL;
    }
    //passwordChange
    public function password(){
        return view('backEnd.admin.password-change');
    }
    //updatePassword
    public function updatePassword(Request $request){
        // $request->validate([
        //     'oldPassword'=>'required',
        //     'newPassword'=>'required',
        //     'confirmPassword'=>'required|same:newPassword',

        // ]);
        return $request;
        $request->validate([
            'oldPassword'=>'required',
            'newPassword'=>'required',
            'confirmPassword'=>'required|same:newPassword',
        ]);
    }
}