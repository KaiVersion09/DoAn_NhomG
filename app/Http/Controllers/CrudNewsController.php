<?php

namespace App\Http\Controllers;
use App\Models\Favorities;
use App\Models\Posts;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class CrudNewsController extends Controller
{
    public function listNews()
    {
        if (Auth::check()) {
            $news = News::paginate(4); 
            return view('crud_news.list_news', ['news' => $news]);
        }
    
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function addNews()
    {
        return view('crud_news.add_news');
    }


public function updateNews(Request $request)
{
    $news_id = $request->get('id');
    $news = News::find($news_id);

    return view('crud_news.update_news', ['news' => $news]);
}



    public function deleteNews(Request $request)
    {
        $news_id = $request->get('id');
        $news = News::destroy($news_id);

        return redirect("list_news")->withSuccess('You have signed-in');
    }

    public function add_News(Request $request)
{
    // Validate request data
    $validator = Validator::make($request->all(), [
        'title' => 'required|unique:news',
        'content' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'title.required' => 'Tiêu đề là bắt buộc.',
        'title.unique' => 'Tiêu đề đã tồn tại.',
        'content.required' => 'Nội dung là bắt buộc.',
        'image.image' => 'File tải lên phải là ảnh.',
        'image.mimes' => 'Ảnh tải lên phải có định dạng jpeg, png, jpg hoặc gif.',
        'image.max' => 'Kích thước của ảnh không được vượt quá 2MB.',
    ]);

    // Check validation result
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Handle image upload
    $imagePath = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $imagePath = 'images/' . $imageName;
    }

    // Create news record
    News::create([
        'title' => $request->input('title'),
        'content' => $request->input('content'),
        'image' => $imagePath,
    ]);

    return redirect()->route('listNews')->with('success', 'Tin tức đã được thêm thành công.');
}

public function postUpdateNews(Request $request)
{
    $input = $request->all();

    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'title.required' => 'Tiêu đề là bắt buộc.',
        'content.required' => 'Nội dung là bắt buộc.',
        'image.image' => 'File tải lên phải là ảnh.',
        'image.mimes' => 'Ảnh tải lên phải có định dạng jpeg, png, jpg hoặc gif.',
        'image.max' => 'Kích thước của ảnh không được vượt quá 2MB.',
    ]);

    // Lấy tin tức cần cập nhật
    $news = News::find($input['id']);
    $news->title = $input['title'];
    $news->content = $input['content'];

    // Xử lý cập nhật ảnh nếu có
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $imagePath = 'images/' . $imageName;
        $news->image = $imagePath; // Cập nhật đường dẫn ảnh mới
    }

    $news->save();

    return redirect("list_news")->withSuccess('Tin tức đã được cập nhật thành công.');
}
    
}
