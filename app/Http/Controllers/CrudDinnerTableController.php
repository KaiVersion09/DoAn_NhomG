<?php

namespace App\Http\Controllers;

use App\Models\DinnerTable;
use Illuminate\Http\Request;
use App\Models\Branch;

class CrudDinnerTableController extends Controller
{
    public function listDinnerTable()
    {
        $tables = DinnerTable::with('branch')->paginate(4); // Lấy 4 bàn ăn mỗi trang và nối các bản ghi chi nhánh
        return view('crud_dinnertable.list_dinnertable', ['tables' => $tables]);
    }

    public function postDinnerTable(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:dinnertables',
            'chair' => 'required|integer|min:1', // Kiểm tra chair là số nguyên và lớn hơn hoặc bằng 1
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'branch' => 'required|exists:branches,id',
        ], [
            'name.required' => 'Vui lòng nhập tên bàn.',
            'name.unique' => 'Tên bàn đã tồn tại.',
            'chair.required' => 'Vui lòng nhập số ghế.',
            'chair.integer' => 'Số ghế phải là một số nguyên.',
            'chair.min' => 'Số ghế phải là một số lớn hơn hoặc bằng 1.', // Thêm thông báo khi số ghế không đạt điều kiện
            'image.image' => 'File tải lên phải là ảnh.',
            'image.mimes' => 'Ảnh tải lên phải có định dạng jpeg, png, jpg hoặc gif.',
            'image.max' => 'Kích thước của ảnh không được vượt quá 2MB.',
            'branch.required' => 'Vui lòng chọn chi nhánh.',
            'branch.exists' => 'Chi nhánh không hợp lệ.',
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
            'branch_id' => $data['branch'], // Lưu trữ branch_id khi tạo mới bàn ăn
        ]);

        return redirect()->route('dinnertable.list'); // Sử dụng redirect thay vì trả về view
    }

    public function updateDinnerTable(Request $request)
    {
        $table_id = $request->get('id');
        $tables = DinnerTable::find($table_id);
        $branches = Branch::all(); // Lấy danh sách các chi nhánh

        return view('crud_dinnertable.update_dinnertable', ['tables' => $tables, 'branches' => $branches]);
    }

    public function postUpdateDinnerTable(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required|unique:dinnertables,name,' . $input['id'], // Thêm điều kiện để kiểm tra tên bàn, trừ bỏ bàn hiện tại
            'chair' => 'required|integer|min:1', // Kiểm tra chair là số nguyên và lớn hơn hoặc bằng 1
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'branch' => 'required|exists:branches,id',
        ], [
            'name.required' => 'Vui lòng nhập tên bàn.',
            'name.unique' => 'Tên bàn đã tồn tại.',
            'chair.required' => 'Vui lòng nhập số ghế.',
            'chair.integer' => 'Số ghế phải là một số nguyên.',
            'chair.min' => 'Số ghế phải là một số lớn hơn hoặc bằng 1.', // Thêm thông báo khi số ghế không đạt điều kiện
            'image.image' => 'File tải lên phải là ảnh.',
            'image.mimes' => 'Ảnh tải lên phải có định dạng jpeg, png, jpg hoặc gif.',
            'image.max' => 'Kích thước của ảnh không được vượt quá 2MB.',
            'branch.required' => 'Vui lòng chọn chi nhánh.',
            'branch.exists' => 'Chi nhánh không hợp lệ.',
        ]);

        // Tìm kiếm bàn ăn trong cơ sở dữ liệu
        $table = DinnerTable::find($input['id']);

        // Kiểm tra xem bàn ăn có tồn tại không trước khi tiếp tục
        if ($table) {
            $table->name = $input['name'];
            $table->chair = $input['chair'];
            $table->branch_id = $input['branch']; // Cập nhật thông tin chi nhánh

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

    public function addDinnerTable()
    {
        // Lấy danh sách các chi nhánh
        $branches = Branch::all();

        // Trả về view 'add_dinnertable' với danh sách các chi nhánh
        return view('crud_dinnertable.add_dinnertable', ['branches' => $branches]);
    }
}
