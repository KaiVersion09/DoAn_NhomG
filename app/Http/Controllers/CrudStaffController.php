<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Staff;
class CrudStaffController extends Controller
{
    public function listStaff()
    {
        return view('crud_staff.list_staff');
    }
    public function addStaff()
    {
        return view('crud_staff.add_staff');
    }
    public function postStaff(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:staff',
            'email' => 'required|email|unique:staff',
            'password' => 'required|min:6',
            'password_confirmation' => 'required_with:password|same:password',
            'phone' => 'required|regex:/^0[0-9]{9}$/|unique:staff',
            'wage' => 'required|min:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'avatar.image' => 'File tải lên phải là ảnh.',
            'avatar.mimes' => 'Ảnh tải lên phải có định dạng jpeg, png, jpg hoặc gif.',
            'avatar.max' => 'Kích thước của ảnh không được vượt quá 2MB.',
        ]);
    
        $data = $request->all();
    
        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time().'.'.$avatar->getClientOriginalExtension();
            $avatar->move(public_path('avatars'), $avatarName);
            $avatarPath = 'avatars/'.$avatarName;
        } else {
            $avatarPath = null; // Set default avatar path if no avatar is uploaded
        }
    
        $check = Staff::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'wage' => $data['wage'],
            'avatar' => $avatarPath, // Save avatar path to the database
        ]);
    
        return redirect("home");
    }

}
