<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class CrudBranchesController extends Controller
{
    public function branches()
    {
        return view('crud_branches.listbranches');
    }

    public function listBranches()
    {
        $branches = Branch::paginate(4);
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

        return redirect()->route('listbranches')->with('success', 'Thêm chi nhánh thành công.');
    }

    // Phương thức để tìm và cập nhật chi nhánh theo ID
    public function updatebranches(Request $request)
    {
        $branch_id = $request->get('id');
        $branch = Branch::find($branch_id);

        if (!$branch) {
            return redirect()->back()->with('error', 'Không tìm thấy chi nhánh.');
        }

        return view('crud_branches.updatebranches', ['branch' => $branch]);
    }
    public function postUpdatebranches(Request $request)
    {
        $request->validate([
            'branches_name' => 'required',
            'branches_phone' => 'required',
            'branches_address' => 'required',
        ]);

        $branch_id = $request->input('id');
        $branch = Branch::find($branch_id);

        if (!$branch) {
            return redirect()->back()->with('error', 'Chi nhánh không tồn tại.');
        }

        $branch->update($request->all());

        return redirect()->route('listbranches')->with('success', 'Thông tin chi nhánh đã được cập nhật thành công.');
    }

    public function deletebranches(Request $request)
    {
        $branch_id = $request->get('id');
        $branch = Branch::find($branch_id);

        if (!$branch) {
            return redirect()->back()->with('error', 'Chi nhánh không tồn tại.');
        }

        $branch->delete();

        return redirect()->route('listbranches')->with('success', 'Chi nhánh đã được xóa thành công.');
    }
}
