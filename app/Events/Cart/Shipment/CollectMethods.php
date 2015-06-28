<?php
namespace App\Events\Cart\Shipment;

use App\Events\Event;
use Lavender\Contracts\Entity;

class CollectMethods extends Event
{
    public $address;

    function __construct(Entity $address)
    {
        $this->address = $address;
    }

}