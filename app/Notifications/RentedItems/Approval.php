<?php

namespace App\Notifications\RentedItems;

use App\Models\RentedItem;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Approval extends Notification
{
    use Queueable;

    public $rentee_request;
    public $status;

    /**
     * Create a new notification instance.
     */
    public function __construct($rented_request_id, $status)
    {
        $this->rentee_request = RentedItem::find($rented_request_id);
        $this->status = $status;

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

        if ($this->status == "rented") {
            // rented status

            $url = url()->to("dashboard");

            return (new MailMessage)->markdown('mail.rented-items.approval',[
                'rented_item' => $this->rentee_request,
                'url' => $url,
                "status" => "rented"
            ])->subject('Rent Request was success');

        } else {
            // rejected status

            return (new MailMessage)->markdown('mail.rented-items.approval',[
                'rented_item' => $this->rentee_request,
                "status" => "rejected"
            ])->subject('Rent Request was rejected');

        }


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
