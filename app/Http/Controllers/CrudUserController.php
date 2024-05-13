<?php

namespace App\Http\Controllers;

use App\Models\Favorities;
use App\Models\Posts;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CrudUserController extends Controller
{
    //Hien thi trang dang nhap
    public function login()
    {
        return view('crud_user.login');
    }
    //register 
    public function registerUser()
    {
        return view('crud_user.register');
    }
    public function postUser(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required_with:password|same:password',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'phone.required' => 'Số điện thoại là bắt buộc.',
            'avatar.image' => 'File tải lên phải là ảnh.',
            'avatar.mimes' => 'Ảnh tải lên phải có định dạng jpeg, png, jpg hoặc gif.',
            'avatar.max' => 'Kích thước của ảnh không được vượt quá 2MB.',
        ]);

        $data = $request->all();

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('avatars'), $avatarName);
            $avatarPath = 'avatars/' . $avatarName;
        } else {
            $avatarPath = null; // Set default avatar path if no avatar is uploaded
        }

        $check = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' => $avatarPath, // Save avatar path to the database
        ]);

        return redirect("login");
    }

    public function home()
    {
        return view('crud_user.home');
    }

    /**
     * User submit form login
     */
    public function authUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
