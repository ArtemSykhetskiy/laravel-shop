<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function __invoke(Request $request)
    {
        $notifications = auth()->user()->unreadNotifications;

        return view('admin/notifications/notifications', compact('notifications'));
    }
}
