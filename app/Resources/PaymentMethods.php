<?php
namespace App\Resources;

use App\Cart;
use App\Events\Cart\Payment\CollectMethods;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Support\Arrayable;
use Lavender\Contracts\Entity;

class PaymentMethods implements Arrayable
{
    protected $cart;

    protected $events;

    public function __construct(Cart $cart, Dispatcher $events)
    {
        $this->cart = $cart;

        $this->events = $events;
    }

    public function getPayments()
    {
        return $this->cart->getPayments();
    }

    public function getMethods(Entity $payment)
    {
        return $this->events->fire(new CollectMethods($payment));
    }

    public function toArray()
    {
        $results = [];

        foreach($this->getPayments() as $payment){

            foreach($this->getMethods($payment) as $rate){

                $results[] = [
                    'label'   => $rate['title'],
                    'name'    => 'method',
                    'value'   => $rate['code'],
                ];

            }

        }

        return $results;
    }

}