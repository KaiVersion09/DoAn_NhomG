<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CrudFoodController extends Controller
{
    public function list()
    {
        return view('crud_food.listfood');
    }


    public function listFood()
    {
        $foods = Food::paginate(4); // Lấy 4 món ăn trên mỗi trang
        return view('crud_food.listfood', ['foods' => $foods]);
    }




    public function food()
    {
        $categories = Category::all(); // Lấy tất cả các danh mục
        return view('crud_food.addfood', compact('categories'));
    }

    public function postFood(Request $request)
    {
        $request->validate([
            'food_name' => 'required',
            'food_price' => 'required|numeric',
            'food_description' => 'required',
            'food_avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'food_name.required' => 'Tên món ăn là bắt buộc.',
            'food_price.required' => 'Giá món ăn là bắt buộc.',
            'food_price.numeric' => 'Giá món ăn phải là số.',
            'food_description.required' => 'Mô tả món ăn là bắt buộc.',
            'food_avatar.image' => 'File tải lên phải là ảnh.',
            'food_avatar.mimes' => 'Ảnh tải lên phải có định dạng jpeg, png, jpg hoặc gif.',
            'food_avatar.max' => 'Kích thước của ảnh không được vượt quá 2MB.',
        ]);

        $data = $request->all();

        // Handle avatar upload
        if ($request->hasFile('food_avatar')) {
            $foodAvatar = $request->file('food_avatar');
            $avatarName = time() . '.' . $foodAvatar->getClientOriginalExtension();
            $foodAvatar->move(public_path('avatars'), $avatarName);
            $avatarPath = 'avatars/' . $avatarName;
        } else {
            $avatarPath = null; // Set default image path if no image is uploaded
        }

        $check = Food::create([
            'food_name' => $data['food_name'],
            'categories_id' => $data['categories_id'],
            'food_price' => $data['food_price'],
            'food_description' => $data['food_description'],
            'food_avatar' => $avatarPath, // Save avatar path to database
        ]);

        return redirect("list_food")->withSuccess('You have signed-in');


    }

    public function updateFood(Request $request)
    {
        $food_id = $request->get('food_id');
        $food = Food::find($food_id);
    
        if (!$food) {
            // Xử lý khi không tìm thấy món ăn
            return redirect()->back()->withError('Không tìm thấy món ăn.');
        }
    
        $categories = Category::all(); // Lấy tất cả các danh mục
    
        return view('crud_food.updatefood', compact('categories', 'food'));
    }
    

    public function postUpdateFood(Request $request)
{
    $request->validate([
        'food_name' => 'required',     
        'food_price' => 'required|numeric',
        'food_description' => 'required',
        'food_avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'food_name.required' => 'Tên món ăn là bắt buộc.',
        'food_price.required' => 'Giá món ăn là bắt buộc.',
        'food_price.numeric' => 'Giá món ăn phải là số.',
        'food_description.required' => 'Mô tả món ăn là bắt buộc.',
        'food_avatar.image' => 'File tải lên phải là ảnh.',
        'food_avatar.mimes' => 'Ảnh tải lên phải có định dạng jpeg, png, jpg hoặc gif.',
        'food_avatar.max' => 'Kích thước của ảnh không được vượt quá 2MB.',
    ]);

    $food_id = $request->input('food_id');
    $food = Food::find($food_id);

    // Kiểm tra xem món ăn có tồn tại không
    if (!$food) {
        return redirect()->back()->withError('Món ăn không tồn tại.');
    }

    $food->food_name = $request->input('food_name');
    $food->categories_id = $request->input('categories_id');
    $food->food_price = $request->input('food_price');
    $food->food_description = $request->input('food_description');

    if ($request->hasFile('food_avatar')) {
        $foodAvatar = $request->file('food_avatar');
        $avatarName = time() . '.' . $foodAvatar->getClientOriginalExtension();
        $foodAvatar->move(public_path('avatars'), $avatarName);
        $avatarPath = 'avatars/' . $avatarName;
        $food->food_avatar = $avatarPath; 
    }

    $food->save();

    return redirect("list_food")->withSuccess('Thông tin món ăn đã được cập nhật thành công.');
}

public function deleteFood(Request $request)
{
    $food_id = $request->get('food_id');
    $food = Food::destroy($food_id);

    return redirect("list_food")->withSuccess('You have signed-in');
}


}
