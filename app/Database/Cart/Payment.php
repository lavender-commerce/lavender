<?php
namespace App\Database\Cart;

use Lavender\Database\Entity;

class Payment extends Entity
{

    protected $entity = 'cart_payment';

    protected $table = 'cart_payment';

    public $timestamps = false;

}