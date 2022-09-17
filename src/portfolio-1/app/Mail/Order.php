<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Order extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $items;
    public $payment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $items, $payment)
    {
        $this->user = $user;
        $this->items = $items;
        $this->payment = $payment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject(__('email.subject.order'))
            ->markdown('emails.order');
    }
}
