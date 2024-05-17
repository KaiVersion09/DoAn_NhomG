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
}
