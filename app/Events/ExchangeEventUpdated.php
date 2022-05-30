<?php

namespace App\Events;

use App\Models\ExchangeEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ExchangeEventUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The transaction instance.
     *
     * @var \App\Models\ExchangeEvent
     */
    public $exchange_event;

    /**
     * Create a new event instance.
     *
     * @param  \App\Models\ExchangeEvent  $exchange_event
     * @return void
     */
    public function __construct(ExchangeEvent $exchange_event)
    {
        $this->exchange_event = $exchange_event;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('exchange-event-updated-channel');
    }
}
