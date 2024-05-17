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
    public function readFood(Request $request)
    {
        $food_id = $request->get('food_id');
        $foods = Food::find($food_id);
        return view('readfood', ['foods' => $foods]);
    } 
    
}
