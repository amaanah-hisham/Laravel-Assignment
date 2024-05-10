<?php

namespace App\Notifications\RentedItems;

use App\Models\RentedItem;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RentedSuccess extends Notification
{
    use Queueable;

    public $rented_item;

    /**
     * Create a new notification instance.
     */
    public function __construct($rented_item_id)
    {
        $this->rented_item = RentedItem::find($rented_item_id);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {

        $url = url()->route('dashboard');

        return (new MailMessage)->markdown('mail.rented-items.rented-success',[
            'rented_item' => $this->rented_item,
            'days_count' => array_key_exists("days_count",$this->rented_item->rented_metadata) ? $this->rented_item->rented_metadata['days_count'] : 1,
            'amount' => array_key_exists("amount",$this->rented_item->rented_metadata) ? $this->rented_item->rented_metadata['amount'] : 1,
            'url' => $url,
        ])->subject("Your product {$this->rented_item->product->title} has been requested for rent");

    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
