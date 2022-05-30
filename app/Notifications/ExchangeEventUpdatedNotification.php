<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ExchangeEventUpdatedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($exchage_event)
    {
        $this->exchage_event = $exchage_event;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'uuid' => $this->exchage_event->uuid,
            'transaction_id' => $this->exchage_event->transaction_id,
            'movement' => $this->exchage_event->movement,
            'asset' => $this->exchage_event->asset,
            'value' => $this->exchage_event->value,
            'txhash' => $this->exchage_event->txhash,
            'status' => $this->exchage_event->status,
            'properties' => $this->exchage_event->properties,
            'result' => $this->exchage_event->result,
        ];
    }
}
