<?php

namespace App\Providers;

use App\Events\ExchangeEventUpdated;
use App\Events\TransactionUpdated;
use App\Listeners\SendExchangeEventUpdatedNotification;
use App\Listeners\SendTransactionUpdatedNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class
        ],
        ExchangeEventUpdated::class => [
            SendExchangeEventUpdatedNotification::class
        ],
        TransactionUpdated::class => [
            SendTransactionUpdatedNotification::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
