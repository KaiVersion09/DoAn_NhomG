<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CrudCategoriesController extends Controller
{
    public function categories()
    {
        return view('crud_categories.listcategories');
    }

    public function listcategories()
    {
        $categories = Category::paginate(4); // Lấy 4 món ăn trên mỗi trang
        return view('crud_categories.listcategories', ['categories' => $categories]);
    }
    public function addcategories()
    {
        return view('crud_categories.addcategories');
    }
    public function postaddcategories(Request $request)
    {
        $request->validate([
            'categories_name' => 'required',
            'categories_description' => 'required',
        ]);

        Category::create($request->all());

        return redirect()->route('listcategories')->withSuccess('Thêm danh mục thành công.');
    }
    public function updatecategories(Request $request)
{
    $category_id = $request->get('categories_id');
    $category = Category::find($category_id);

    if (!$category) {
        return redirect()->back()->withError('Không tìm thấy danh mục.');
    }

    return view('crud_categories.updatecategories', ['category' => $category]);
}

public function postupdatecategories(Request $request)
{
    $request->validate([
        'categories_name' => 'required',
        'categories_description' => 'required',
    ]);

    $category_id = $request->input('categories_id');
    $category = Category::find($category_id);

    // Kiểm tra xem danh mục có tồn tại không
    if (!$category) {
        return redirect()->back()->withError('Danh mục không tồn tại.');
    }

    $category->categories_name = $request->input('categories_name');
    $category->categories_description = $request->input('categories_description');

    $category->save();

    return redirect()->route('listcategories')->withSuccess('Thông tin danh mục đã được cập nhật thành công.');
}

public function deletecategories(Request $request)
{
    $category_id = $request->get('categories_id');
    $category = Category::destroy($category_id);

    if (!$category) {
        return redirect()->back()->withError('Danh mục không tồn tại.');
    }

    return redirect()->route('listcategories')->withSuccess('Danh mục đã được xóa thành công.');
}
}
