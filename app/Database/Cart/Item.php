<?php
namespace App\Database\Cart;

use Lavender\Database\Entity;

class Item extends Entity
{

    protected $entity = 'cart_item';

    protected $table = 'cart_item';

    public $timestamps = false;

    protected $_price;


    public function getPrice($format = false)
    {
        if(!isset($this->_price)){

            //todo calculate product options

            $this->_price = $this->product()->first()->price;

        }

        return $format ? price($this->_price) : $this->_price;
    }


    public function getSubtotal($format = false)
    {
        if(!isset($this->_subtotal)){

            $this->_subtotal = $this->getPrice() * $this->qty;

        }

        return $format ? price($this->_subtotal) : $this->_subtotal;
    }
}