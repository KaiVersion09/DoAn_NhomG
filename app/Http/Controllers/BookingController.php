<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\branch;
use App\Models\DinnerTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Thêm dòng này để import Auth

class BookingController extends Controller
{

    public function create(Request $request)
    {
        $branches = branch::all();
        $tables = collect();

        if ($request->has('branch_id')) {
            $branch_id = $request->branch_id;
            logger("Selected Branch ID: $branch_id"); // Log giá trị của branch_id
            $tables = DinnerTable::where('branch_id', $branch_id)->get();
        }

        return view('datban', compact('branches', 'tables'));
    }


    public function store(Request $request)
    {

        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (Auth::check()) {
            // Lấy id của người dùng đã đăng nhập
            $user_id = Auth::id();

            // Validate dữ liệu từ form
            $request->validate([
                'branch_id' => 'required|exists:branches,id',
                'dinner_table_id' => 'required|exists:dinnertables,id',
                'booking_time' => 'required|date',
                'number_of_guests' => 'required|integer|min:1',
            ]);

            // Tạo đối tượng Booking và lưu vào cơ sở dữ liệu
            Booking::create([
                'user_id' => $user_id,
                'branch_id' => $request->branch_id,
                'dinner_table_id' => $request->dinner_table_id,
                'booking_time' => $request->booking_time,
                'number_of_guests' => $request->number_of_guests,
            ]);

            // Chuyển hướng người dùng đến trang đặt bàn hoặc hiển thị thông báo thành công
            return redirect()->route('booking.create')->with('success', 'Đặt bàn thành công!');
        } else {
            // Người dùng chưa đăng nhập, xử lý tùy thuộc vào yêu cầu của bạn
        }
    }
}
