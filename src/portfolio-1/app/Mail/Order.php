<?php

/* 注文処理後に送信されるメール（注文処理のリスナに送信処理が記述されている） */

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Order extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $addressee;
    public $items;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $addressee, $items)
    {
        $this->user = $user;
        $this->addressee = $addressee;
        $this->items = $items;
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
