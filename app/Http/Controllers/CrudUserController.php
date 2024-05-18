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
    public function signOut()
    {

        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
    //Hien thi trang dang nhap
    public function login()
    {
        return view('crud_user.login');
    }
    public function list()
    {
        return view('crud_user.list_user');
    }
    public function listUser()
    {
        if (Auth::check()) {
            $users = User::paginate(4); // Lấy 4 người dùng mỗi trang
            return view('crud_user.list_user', ['users' => $users]);
        }

        return redirect("login")->withSuccess('You are not allowed to access');
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

    /**
     * Delete user by id
     */
    public function deleteUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::destroy($user_id);

        return redirect("list_user")->withSuccess('You have signed-in');
    }

    /**
     * Form update user page
     */
    public function updateUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('crud_user.update_user', ['user' => $user]);
    }

    /**
     * Submit form update user
     */
    public function postUpdateUser(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $input['id'],
            'password' => 'nullable|min:6', // Bạn có thể cho phép mật khẩu là null nếu không muốn bắt buộc cập nhật
            'password_confirmation' => 'required_with:password|same:password',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'avatar.image' => 'File tải lên phải là ảnh.',
            'avatar.mimes' => 'Ảnh tải lên phải có định dạng jpeg, png, jpg hoặc gif.',
            'avatar.max' => 'Kích thước của ảnh không được vượt quá 2MB.',
        ]);
        //cap nhap thong tin nguoi dung dua tren csdl
        $user = User::find($input['id']);
        $user->name = $input['name'];
        $user->email = $input['email'];

        if (!empty($input['password'])) {
            $user->password = Hash::make($input['password']);
        }

        // Xử lý cập nhật avatar nếu có
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('avatars'), $avatarName);
            $avatarPath = 'avatars/' . $avatarName;
            $user->avatar = $avatarPath; // Cập nhật đường dẫn avatar mới
        }

        $user->save();

        return redirect("list_user")->withSuccess('You have signed-in');
    }
}
