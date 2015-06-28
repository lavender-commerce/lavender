<?php
namespace App;

use Lavender\Contracts\Entity;
use Lavender\Support\SharedEntity;

class Cart extends SharedEntity
{

    function __construct()
    {
        if(!$cart = $this->findInSession()){

            $cart = $this->newCartInstance();

        }

        $this->setCart($cart);
    }

    public function getCart()
    {
        return entity('cart')->find($this->id);
    }

    public function update(array $params)
    {
        $cart = $this->getCart();

        return $cart->update($params);
    }

    public function getItems()
    {
        $cart = $this->getCart();

        return $cart->items;
    }

    public function getShipments()
    {
        $cart = $this->getCart();

        return $cart->shipments;
    }

    public function getShipment($number)
    {
        $cart = $this->getCart();

        return $cart->shipments()->where('number', '=', $number)->first();
    }

    public function getPayments()
    {
        $cart = $this->getCart();

        return $cart->payments;
    }

    public function getPayment($number)
    {
        $cart = $this->getCart();

        return $cart->payments()->where('number', '=', $number)->first();
    }

    public function unsetCart()
    {
        $this->setCartSession(null);

        $this->unsetData();
    }

    public function setCart(Entity $cart)
    {
        // set cart id in session
        $this->setCartSession($cart->id);

        // set cart entity data
        $this->setEntity($cart);
    }



    public function readyToShip()
    {
        // todo check all shipments
        $shipment = $this->getShipment(1);

        return $shipment && $shipment->address && $shipment->method;
    }



    public function paidInFull()
    {
        // todo check all payments
        $payment = $this->getPayment(1);

        return $payment && $payment->total == $this->getTotal();
    }



    public function checkoutSuccess()
    {
        // todo find a better way
        return \Session::get('cart.success');
    }



    public function getItemsCount()
    {
        return $this->getItems()->count();
    }


    public function getSummary()
    {
        $items_count = 0;

        foreach($this->getItems() as $item){

            $items_count += $item->qty;

        }

        return $items_count;
    }


    public function getTotal()
    {
        $total = 0;

        foreach($this->getItems() as $item){

            $total += $item->getSubtotal();

        }

        return $total;
    }


    protected function findInSession()
    {
        // check if session has a cart id
        if($cart_id = $this->getCartSession()){

            // if a cart id is found in session:
            //  - verify that it belongs to a cart
            //  - verify that it is still open
            return entity('cart')->where([
                'id' => $cart_id,
                'status' => 'open'
            ])->first();

        }

        return false;
    }


    protected function newCartInstance()
    {
        // create new cart instance
        $cart = entity('cart');

        $cart->save();

        return $cart;
    }


    /**
     * @return mixed
     */
    protected function getCartSession()
    {
        return \Session::get("sales_cart");
    }


    /**
     * @param $var
     */
    protected function setCartSession($var)
    {
        \Session::put("sales_cart", $var);
    }

}