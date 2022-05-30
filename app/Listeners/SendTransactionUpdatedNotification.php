<?php

namespace App\Listeners;

use App\Events\TransactionUpdated;
use App\Models\User;
use App\Notifications\TransactionUpdatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendTransactionUpdatedNotification
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
    public function handle(TransactionUpdated $event)
    {
        $notificationUsers = User::whereHas('roles', function ($query) {
            $query->whereHas('permissions', function ($query) {
                $query->where('name', 'access-notification-center');
            });
        })->get();

        Notification::send($notificationUsers, new TransactionUpdatedNotification($event->transaction));
    }
}
