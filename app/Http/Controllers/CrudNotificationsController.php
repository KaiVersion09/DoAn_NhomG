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
    public function updatenotifications(Request $request)
{
    $notification_id = $request->get('notifications_id');
    $notification = Notification::find($notification_id);

    if (!$notification) {
        return redirect()->back()->withError('Không tìm thấy thông báo.');
    }

    return view('crud_notifications.updatenotifications', ['notification' => $notification]);
}

public function postupdatenotifications(Request $request)
{
    $request->validate([
        'notifications_content' => 'required',
        'notifications_time' => 'required',
    ]);

    $notification_id = $request->input('notifications_id');
    $notification = Notification::find($notification_id);

    // Kiểm tra xem thông báo có tồn tại không
    if (!$notification) {
        return redirect()->back()->withError('Thông báo không tồn tại.');
    }

    $notification->notifications_content = $request->input('notifications_content');
    $notification->notifications_time = $request->input('notifications_time');

    $notification->save();

    return redirect()->route('listnotifications')->withSuccess('Thông tin thông báo đã được cập nhật thành công.');
}

}
