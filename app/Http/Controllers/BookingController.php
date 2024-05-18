<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\branch;
use App\Models\DinnerTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create()
    {


        $branches = branch::all();
        $tables = DinnerTable::all();
        return view('datban', compact('branches', 'tables'));
    }
    public function store(Request $request)
{
    // Validate dữ liệu từ form
    $request->validate([
        'booking_time' => 'required|date',
        'number_of_guests' => 'required|integer|min:1',
    ]);

    // Tạo một đối tượng Booking và lưu vào cơ sở dữ liệu
    Booking::create([
        'branch_id' => $request->branch_id,
        'dinner_table_id' => $request->dinner_table_id,
        'booking_time' => $request->booking_time,
        'user_id' => Auth::id(),
        'number_of_guests' => $request->number_of_guests,
    ]);

    // Chuyển hướng người dùng đến trang khác hoặc hiển thị thông báo thành công
    return redirect()->route('booking.success')->with('success', 'Đặt bàn thành công!');
}

}
