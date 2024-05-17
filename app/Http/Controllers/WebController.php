<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function show()
    {
        return view('showfood');
    }

    public function showfood()
    {
        $foods = Food::paginate(4); // Lấy 4 món ăn trên mỗi trang
        return view('showfood', ['foods' => $foods]);
    }
}
