<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DemoWialon extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $order;


    public function __construct($request)
    {
        $this->order = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Запрошенный Вами демо-доступ к системе Wialon')
            ->view('email.order.demo-access-wialon',[
                'name' => $this->order->name,
                'email' => $this->order->email
//                'priceOrKp' => $priceOrKp,
//                'priceOrKpLink' => $priceOrKpLink
            ]);
    }
}
