<?php
namespace App\Resources;

use App\Cart;
use App\Events\Cart\Shipment\CollectMethods;
use Illuminate\Contracts\Support\Arrayable;
use Lavender\Contracts\Entity;

class ShipmentMethods implements Arrayable
{
    protected $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function getShipments()
    {
        return $this->cart->getShipments();
    }

    public function getMethods(Entity $address)
    {
        return event(new CollectMethods($address));
    }

    public function toArray()
    {
        $results = [];

        foreach($this->getShipments() as $shipment){

            foreach($this->getMethods($shipment->address) as $rate){

                $results[] = [
                    'label'   => $rate['title'] . ' - ' . price($rate['price']),
                    'name'    => 'method',
                    'value'   => $rate['code'],
                ];

            }

        }

        return $results;
    }

}