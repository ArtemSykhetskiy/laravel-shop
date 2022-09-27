<?php

namespace App\Listeners;

use App\Events\OrderAdminNotification;
use App\Models\User;
use App\Notifications\NewOrderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class OrderAdminListener
{
    public function handle($event)
    {
        $admins = User::where('role_id', 1)->get();

        Notification::send($admins, new NewOrderNotification($event->user));
    }
}
