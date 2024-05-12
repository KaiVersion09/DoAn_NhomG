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
}
