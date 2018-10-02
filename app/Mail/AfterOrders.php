<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AfterOrders extends Mailable
{

    use Queueable, SerializesModels;


    /**
     * The order instance.
     *
     * @var Order
     */
    protected $order;


    /**
     */
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
        //нужно выяснить что за заявка и в зависимости от этого сформировать письмо
        //тахи
        //TODO починить это геморой с ифами
        if($this->order->direction_id == 6){
            $tmp = 'tahograf';
            if($this->order->type_order == 'PRICE'){
                $priceOrKp = 'Запрошенный Вами прайс лист';
                $priceOrKpLink = '//www.stavtrack.kz/files/price_tacho.pdf';
                $path_files = 'app/public/files/price_tacho.pdf';
            } else {
                $priceOrKp = 'Запрошенное Вами коммерческое предложение';
                $priceOrKpLink = '//www.stavtrack.kz/files/new-compred.pdf';
                $path_files = 'app/public/files/new-compred.pdf';
            }

        } elseif ($this->order->direction_id == 7) { //карты
            $tmp = 'cards';
            $priceOrKp = 'Запрошенный Вами прайс лист';
            $priceOrKpLink = '';
            $path_files = 'app/public/files/price_tacho.pdf';
        } else { //остальное
            $tmp = 'monitoring';
            if($this->order->type_order == 'PRICE'){
                $priceOrKp = 'Запрошенный Вами прайс лист';
                $priceOrKpLink = '//www.stavtrack.kz/files/price.pdf';
                $path_files = 'app/public/files/price.pdf';
            } else {
                $priceOrKp = 'Запрошенное Вами коммерческое предложение';
                $priceOrKpLink = '//www.stavtrack.kz/files/new-compred.pdf';
                $path_files = 'app/public/files/new-compred.pdf';
            }
        }
        return $this
            ->subject($priceOrKp)
            ->view('email.order.'.$tmp,[
                'name' => $this->order->name,
                'email' => $this->order->email,
                'priceOrKp' => $priceOrKp,
                'priceOrKpLink' => $priceOrKpLink
            ])
            ->attach(storage_path($path_files), [
                'as' => 'document.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}
