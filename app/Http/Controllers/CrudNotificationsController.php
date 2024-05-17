<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use Illuminate\Http\Request;

class CrudNotificationsController extends Controller
{
    public function notifications()
    {
        return view('crud_notifications.listnotifications');
    }

    public function listnotifications()
    {
        $notifications = Notification::paginate(4); // Lấy 4 món ăn trên mỗi trang
        return view('crud_notifications.listnotifications', ['notifications' => $notifications]);
    }
    public function addnotifications()
    {
        return view('crud_notifications.addnotifications');
    }
    public function postaddnotifications(Request $request)
    {
        $request->validate([
            'notifications_content' => 'required',
            'notifications_time' => 'required',
        ]);

        Notification::create($request->all());

        return redirect()->route('listnotifications')->withSuccess('Thêm thông báo thành công.');
    }
}
