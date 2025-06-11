<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    //

    public function index(){
        $users = User::get();
        return view('superadmin.home',compact('users'));
    }

    public function addUser(){
        return view('superadmin.add_user');
    }

    public function storeUser(Request $request){
        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role=$request->role;
        $user->password=Hash::make($request->password);

        if($request->hasFile('profile_photo')){
            $image=$request->profile_photo;
            $ext=$image->getClientOriginalExtension();
            $imageName=time().'.'.$ext;
            $image->move(public_path('uploads/profile_photos'),$imageName);
            $user->profile_photo = $imageName;
        }

        $user->save();
        return redirect()->route('superadmin.home');
    }

    public function editUser($id){
        $user=User::findOrFail($id);
        return view('superadmin.edit_user',compact('user'));
    }

    public function updateUser(Request $request){
        $user=User::findOrFail($request->id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role=$request->role;

        if($request->hasFile('profile_photo')){
            $image=$request->profile_photo;
            $ext=$image->getClientOriginalExtension();
            $imageName=time().'.'.$ext;
            $image->move(public_path('uploads/profile_photos'),$imageName);
            $user->profile_photo = $imageName;
        }

        $user->save();
        return redirect()->route('superadmin.home');

    }

    public function deleteUser($id){
        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }
}
