<?php

namespace App\Listeners;

use App\Events\ExchangeEventUpdated;
use App\Models\User;
use App\Notifications\ExchangeEventUpdatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendExchangeEventUpdatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ExchangeEventUpdated $event)
    {
        $notificationUsers = User::whereHas('roles', function ($query) {
            $query->whereHas('permissions', function ($query) {
                $query->where('name', 'access-notification-center');
            });
        })->get();

        Notification::send($notificationUsers, new ExchangeEventUpdatedNotification($event->exchange_event));
    }
}
