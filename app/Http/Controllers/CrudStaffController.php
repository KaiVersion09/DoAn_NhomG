<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Staff;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;

class CrudStaffController extends Controller
{

    public function addStaff()
    {
        $branches = Branch::all();
        return view('crud_staff.add_staff', ['branches' => $branches]);
    }

    public function postStaff(Request $request)
    {
        // Validate form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:staff',
            'password' => 'required|min:6',
            'password_confirmation' => 'required_with:password|same:password',
            'phone' => 'required|regex:/^0[0-9]{9}$/|unique:staff',
            'wage' => 'required|min:6',
            'branch_id' => 'required|exists:branches,id', // Add validation for branch_id
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'branch_id.required' => 'Bạn phải chọn chi nhánh.',
            'branch_id.exists' => 'Chi nhánh không tồn tại.',
            'avatar.image' => 'File tải lên phải là ảnh.',
            'avatar.mimes' => 'Ảnh tải lên phải có định dạng jpeg, png, jpg hoặc gif.',
            'avatar.max' => 'Kích thước của ảnh không được vượt quá 2MB.',
        ]);

        // Get all form data
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

        // Create new staff member
        $staff = Staff::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'wage' => $data['wage'],
            'branch_id' => $data['branch_id'], // Assign branch_id to the new staff member
            'avatar' => $avatarPath, // Save avatar path to the database
        ]);

        // Retrieve updated list of staff members
        $staffs = Staff::paginate(4);

        // Return the view with the updated list of staff members
        return view('crud_staff.list_staff', ['staffs' => $staffs]);
    }

    public function listStaff()
    {
        if (Auth::check()) {
            $staffs = Staff::paginate(4); // Lấy 4 người dùng mỗi trang
            return view('crud_staff.list_staff', ['staffs' => $staffs]);
        }
    }

    public function deleteStaff(Request $request)
    {
        $staff_id = $request->get('id');
        $staffs = Staff::destroy($staff_id);

        // Lấy lại danh sách nhân viên sau khi xóa
        $staffs = Staff::paginate(4);

        // Trả về view với danh sách nhân viên đã cập nhật
        return view('crud_staff.list_staff', ['staffs' => $staffs]);
    }

    public function updateStaff(Request $request)
    {
        $staff_id = $request->get('id');
        $staff = Staff::find($staff_id);
        $branches = Branch::all(); // Lấy danh sách các chi nhánh
        return view('crud_staff.update_staff', ['staff' => $staff, 'branches' => $branches]);
    }


    /**
     * Submit form update user
     */
    public function postUpdateStaff(Request $request)
    {
        $input = $request->all();

        // Validate form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:staff,email,' . $input['id'],
            'phone' => 'required|regex:/^0[0-9]{9}$/|unique:staff,phone,' . $input['id'],
            'wage' => 'required|min:6',
            'branch_id' => 'required|exists:branches,id',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Vui lòng nhập tên đăng nhập.',
            'name.unique' => 'Tên đăng nhập đã tồn tại.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'phone.unique' => 'Số điện thoại đã tồn tại.',
            'wage.required' => 'Vui lòng nhập lương.',
            'wage.min' => 'Lương phải có ít nhất 6 ký tự.',
            'branch_id.required' => 'Vui lòng chọn chi nhánh.',
            'branch_id.exists' => 'Chi nhánh không hợp lệ.',
            'avatar.image' => 'File tải lên phải là ảnh.',
            'avatar.mimes' => 'Ảnh tải lên phải có định dạng jpeg, png, jpg hoặc gif.',
            'avatar.max' => 'Kích thước của ảnh không được vượt quá 2MB.',
        ]);

        // Tìm kiếm nhân viên trong cơ sở dữ liệu
        $staff = Staff::find($input['id']);

        // Kiểm tra xem nhân viên có tồn tại không trước khi tiếp tục
        if ($staff) {
            $staff->name = $input['name'];
            $staff->email = $input['email'];
            $staff->phone = $input['phone'];
            $staff->wage = $input['wage'];
            $staff->branch_id = $input['branch_id']; // Cập nhật thông tin chi nhánh

            // Cập nhật mật khẩu nếu có
            if (!empty($input['password'])) {
                $staff->password = Hash::make($input['password']);
            }

            // Cập nhật avatar nếu có
            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
                $avatar->move(public_path('avatars'), $avatarName);
                $avatarPath = 'avatars/' . $avatarName;
                $staff->avatar = $avatarPath;
            }

            $staff->save();

            // Redirect về danh sách nhân viên sau khi cập nhật thành công
            return redirect()->route('staff.list')->with('success', 'Cập nhật thông tin nhân viên thành công.');
        } else {
            // Xử lý khi không tìm thấy nhân viên
            return back()->with('error', 'Không tìm thấy nhân viên.');
        }
    }
}
