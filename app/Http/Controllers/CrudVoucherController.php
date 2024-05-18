<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class CrudVoucherController extends Controller
{
    public function list()
    {
        return view('crud_voucher.listvoucher');
    }


    public function listVoucher()
    {
        $vouchers = Voucher::paginate(4);
        return view('crud_voucher.listvoucher', ['vouchers' => $vouchers]);
    }
<<<<<<< HEAD
}
=======

    public function voucher()
    {
        return view('crud_voucher.addvoucher');
    }

    public function postVoucher(Request $request)
    {
        $request->validate([
            'voucher_name' => 'required|unique:vouchers,voucher_name',
            'discount_percentage' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'code' => 'required|unique:vouchers,code',
        ], [
            'voucher_name.required' => 'Tên voucher là bắt buộc.',
            'voucher_name.unique' => 'Tên voucher đã tồn tại.',
            'discount_percentage.required' => 'Phần trăm giảm giá là bắt buộc.',
            'discount_percentage.integer' => 'Phần trăm giảm giá phải là số nguyên.',
            'start_date.required' => 'Ngày bắt đầu là bắt buộc.',
            'start_date.date' => 'Ngày bắt đầu phải là ngày hợp lệ.',
            'end_date.required' => 'Ngày kết thúc là bắt buộc.',
            'end_date.date' => 'Ngày kết thúc phải là ngày hợp lệ.',
            'end_date.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu.',
            'code.required' => 'Mã voucher là bắt buộc.',
            'code.unique' => 'Mã voucher đã tồn tại.',
        ]);

        $data = $request->all();

        $check = Voucher::create([
            'voucher_name' => $data['voucher_name'],
            'discount_percentage' => $data['discount_percentage'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'code' => $data['code'],
        ]);

        return redirect("list_voucher")->withSuccess('Voucher đã được thêm thành công.');
    }

    public function editVoucher($id)
    {
        $voucher = Voucher::find($id);
        return view('crud_voucher.updatevoucher', compact('voucher'));
    }

    public function postUpdateVoucher(Request $request)
    {
        $request->validate([
            'voucher_name' => 'required|unique:vouchers,voucher_name,' . $request->voucher_id . ',voucher_id',
            'discount_percentage' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'code' => 'required|unique:vouchers,code,' . $request->voucher_id . ',voucher_id',
        ], [
            'voucher_name.required' => 'Tên voucher là bắt buộc.',
            'voucher_name.unique' => 'Tên voucher đã tồn tại.',
            'discount_percentage.required' => 'Phần trăm giảm giá là bắt buộc.',
            'discount_percentage.integer' => 'Phần trăm giảm giá phải là số nguyên.',
            'start_date.required' => 'Ngày bắt đầu là bắt buộc.',
            'start_date.date' => 'Ngày bắt đầu phải là ngày hợp lệ.',
            'end_date.required' => 'Ngày kết thúc là bắt buộc.',
            'end_date.date' => 'Ngày kết thúc phải là ngày hợp lệ.',
            'end_date.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu.',
            'code.required' => 'Mã voucher là bắt buộc.',
            'code.unique' => 'Mã voucher đã tồn tại.',
        ]);

        $voucher = Voucher::find($request->voucher_id);
        $voucher->update($request->all());

        return redirect()->route('voucher.list')->withSuccess('Voucher đã được cập nhật thành công.');
    }

    public function deleteVoucher(Request $request)
    {
        $voucher_id = $request->get('voucher_id');
        $vouchers = Voucher::find($voucher_id);
    
        if ($vouchers) {
            $vouchers->delete();
            return redirect()->route('voucher.list')->withSuccess('Voucher đã được xóa thành công.');
        } else {
            return redirect()->route('voucher.list')->withErrors('Voucher không tồn tại.');
        }
    }
}    
>>>>>>> delete_voucher
