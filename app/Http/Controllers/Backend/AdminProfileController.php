<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function AdminProfile(){
       // $id = Auth::user()->id;
        $adminData = Admin::find(1);

        return view('admin.admin_profile',compact('adminData'));
    }

    public function AdminProfileEdit(){
        $editData = Admin::find(1);

        return view('admin.admin_profile_edit',compact('editData'));
    }

    public function AdminProfileStore(Request $request){
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;
        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_image/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_image'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'admin profile mise à jour avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }


    public function AdminChangePassword(){

        return view('admin.admin_change_password');
    }
    public function UpdateChangePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Admin::find(1)->password;
        if(Hash::check($request->oldpassword, $hashedPassword)){
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('login');
        }else{
            return redirect()->back();
        }
    }

    public function AllUserView(){
        $users = User::latest()->get();
        return view('backend.user.all_user',compact('users'));
    }
}
