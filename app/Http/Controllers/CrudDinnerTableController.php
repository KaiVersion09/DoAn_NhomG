<?php

namespace App\Http\Controllers;

use App\Models\Favorities;
use App\Models\Posts;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\DinnerTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CrudDinnerTableController extends Controller
{
    public function listDinnerTable()
    {
        $tables = DinnerTable::paginate(4); // Lấy 4 người dùng mỗi trang
        return view('crud_dinnertable.list_dinnertable', ['tables' => $tables]);
    }
    public function addDinnerTable()
    {
        return view('crud_dinnertable.add_dinnertable');
    }
    public function postDinnerTable(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:dinnertable',
            'chair' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Tên bàn là bắt buộc',
            'chair.required' => 'Số ghê là bắt buộc',
            'image.image' => 'File tải lên phải là ảnh.',
            'image.mimes' => 'Ảnh tải lên phải có định dạng jpeg, png, jpg hoặc gif.',
            'image.max' => 'Kích thước của ảnh không được vượt quá 2MB.',
        ]);

        $data = $request->all();

        // Handle avatar upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('avatars'), $imageName);
            $imagePath = 'avatars/' . $imageName;
        } else {
            $imagePath = null; // Set default avatar path if no avatar is uploaded
        }

        $check = DinnerTable::create([
            'name' => $data['name'],
            'chair' => $data['chair'],
            'image' => $imagePath, // Save avatar path to the database
        ]);

        return redirect("listDinnerTable");
    }
}
