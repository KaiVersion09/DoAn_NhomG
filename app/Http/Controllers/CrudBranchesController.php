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

    public function updatebranches(Request $request)
    {
        $branch_id = $request->get('branches_id');
        $branch = Branch::find($branch_id);

        if (!$branch) {
            return redirect()->back()->withError('Không tìm thấy chi nhánh.');
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

        $branch_id = $request->input('branches_id');
        $branch = Branch::find($branch_id);

        // Kiểm tra xem chi nhánh có tồn tại không
        if (!$branch) {
            return redirect()->back()->withError('Chi nhánh không tồn tại.');
        }

        $branch->branches_name = $request->input('branches_name');
        $branch->branches_phone = $request->input('branches_phone');
        $branch->branches_address = $request->input('branches_address');

        $branch->save();

        return redirect()->route('listbranches')->withSuccess('Thông tin chi nhánh đã được cập nhật thành công.');
    }

    public function deletebranches(Request $request)
    {
        $branch_id = $request->get('branches_id');
        $branch = Branch::destroy($branch_id);
    
        if (!$branch) {
            return redirect()->back()->withError('Chi nhánh không tồn tại.');
        }
    
        return redirect("listbranches")->withSuccess('You have signed-in');
    }

}
