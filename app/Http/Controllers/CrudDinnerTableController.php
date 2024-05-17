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
            'chair' => 'required|integer|min:1', // Kiểm tra chair là số nguyên và lớn hơn hoặc bằng 1
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Vui lòng nhập tên bàn.',
            'name.unique' => 'Tên bàn đã tồn tại.',
            'chair.required' => 'Vui lòng nhập số ghế.',
            'chair.integer' => 'Số ghế phải là một số nguyên.',
            'chair.min' => 'Số ghế phải là một số lớn hơn hoặc bằng 1.', // Thêm thông báo khi số ghế không đạt điều kiện
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

        return redirect()->route('dinnertable.list'); // Sử dụng redirect thay vì trả về view
    }

    public function updateDinnerTable(Request $request)
    {
        $table_id = $request->get('id');
        $tables = DinnerTable::find($table_id);

        return view('crud_dinnertable.update_dinnertable', ['tables' => $tables]);
    }

    public function postUpdateDinnerTable(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'chair' => 'required|integer|min:1', // Kiểm tra chair là số nguyên và lớn hơn hoặc bằng 1
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Vui lòng nhập tên bàn.',
            'name.unique' => 'Tên bàn đã tồn tại.',
            'chair.required' => 'Vui lòng nhập số ghế.',
            'chair.integer' => 'Số ghế phải là một số nguyên.',
            'chair.min' => 'Số ghế phải là một số lớn hơn hoặc bằng 1.', // Thêm thông báo khi số ghế không đạt điều kiện
            'image.image' => 'File tải lên phải là ảnh.',
            'image.mimes' => 'Ảnh tải lên phải có định dạng jpeg, png, jpg hoặc gif.',
            'image.max' => 'Kích thước của ảnh không được vượt quá 2MB.',
        ]);
        
        

        // Tìm kiếm bàn ăn trong cơ sở dữ liệu
        $table = DinnerTable::find($input['id']);

        // Kiểm tra xem bàn ăn có tồn tại không trước khi tiếp tục
        if ($table) {
            $table->name = $input['name'];
            $table->chair = $input['chair'];
            // Cập nhật ảnh nếu có
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('avatars'), $imageName);
                $imagePath = 'avatars/' . $imageName;
                $table->image = $imagePath;
            }
            $table->save();

            // Redirect về danh sách bàn ăn sau khi cập nhật thành công
            return redirect()->route('dinnertable.list');
        } else {
            // Xử lý khi không tìm thấy bàn ăn
            // Ví dụ: Hiển thị thông báo lỗi
            return back()->with('error', 'Không tìm thấy bàn ăn!');
        }
    }

    public function deleteDinnerTable(Request $request)
    {
        $table_id = $request->get('id');
        $table = DinnerTable::destroy($table_id);

        // Lấy lại danh sách bàn ăn sau khi xóa
        $tables = DinnerTable::paginate(4);

        // Trả về view với danh sách bàn ăn đã cập nhật
        return view('crud_dinnertable.list_dinnertable', ['tables' => $tables]);
    }
}
