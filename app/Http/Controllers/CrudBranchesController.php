<?php

namespace App\Http\Controllers;

use App\Models\branch;
use Illuminate\Http\Request;

class CrudBranchesController extends Controller
{
    public function branches()
    {
        return view('crud_branches.listbranches');
    }
    
    public function listBranches()
    {
        $branches = branch::paginate(4); // Lấy 4 món ăn trên mỗi trang
        return view('crud_branches.listbranches', ['branches' => $branches]);
    }
    public function addbranches()
    {
        return view('crud_branches.addbranches');
    }

    public function postaddBranch(Request $request)
    {
        $request->validate([
            'branches_name' => 'required',
            'branches_phone' => 'required',
            'branches_address' => 'required',
        ]);

        Branch::create($request->all());

        return redirect()->route('listbranches')->withSuccess('Thêm chi nhánh thành công.');
    }

}
