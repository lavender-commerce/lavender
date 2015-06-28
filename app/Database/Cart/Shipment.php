<?php
namespace App\Database\Cart;

use Lavender\Database\Entity;

class Shipment extends Entity
{

    protected $entity = 'cart_shipment';

    protected $table = 'cart_shipment';

    public $timestamps = false;
}