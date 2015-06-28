<?php
namespace App\Events\Cart\Payment;

use App\Events\Event;
use Lavender\Contracts\Entity;

class CollectMethods extends Event
{
    public $payment;

    function __construct(Entity $payment)
    {
        $this->payment = $payment;
    }

}