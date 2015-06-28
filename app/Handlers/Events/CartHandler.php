<?php
namespace App\Handlers\Events;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Lavender\Contracts\Entity;

class CartHandler
{
    use DispatchesCommands;

    /**
     * @param Entity $account
     */
    public function customer_login(Entity $account)
    {
        try{
            // if account login is a customer
            if($account->getEntityName() == 'customer'){

                $cart = app('App\Cart');

                // load customer cart
                if($customer_cart = $account->getCart()){

                    // if cart ids don't match, we must merge their contents
                    if($customer_cart->id != $cart->id){

                        $original_cart = $cart->getCart();

                        foreach($original_cart->items as $item){

                            // reassign cart_id to customer's cart
                            $item->cart_id = $customer_cart->id;

                            $this->dispatchFromArray(
                                'App\Commands\Cart\AddToCart',
                                $item->getAttributes()
                            );

                        }

                        // delete original cart
                        $original_cart->delete();

                        // assign the customers cart
                        $cart->setCart($customer_cart);

                    } else {

                        //do nothing

                    }

                } else {

                    // load the current cart
                    $customer_cart = entity('cart')->find($cart->id);

                    // assign customer to cart
                    $customer_cart->fill(['customer' => $account]);

                    $customer_cart->save();

                    // assign the cart to global scope
                    $cart->setCart($customer_cart);

                }

            }

        } catch(\Exception $e){

            // todo log exception
            var_dump($e->getMessage());die;


        }
    }

    /**
     * todo move to command
     * @param $account
     */
    public function customer_logout(Entity $account)
    {
        if($account->getEntityName() == 'customer'){

            $cart = app('App\Cart');

            $cart->unsetCart();

        }
    }

    public function shipment_methods()
    {
        //todo use store config for default shipping methods
        return ['code' => 'free', 'title' => 'Free Shipping', 'price' => '0.00'];
    }

    public function payment_methods()
    {
        //todo use store config for default payment methods
        return ['code' => 'pickup', 'title' => 'In Store Pickup'];
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen(
            'auth.logout',
            'App\Handlers\Events\CartHandler@customer_logout'
        );
        $events->listen(
            'auth.login',
            'App\Handlers\Events\CartHandler@customer_login'
        );
        $events->listen(
            'App\Events\Cart\Shipment\CollectMethods',
            'App\Handlers\Events\CartHandler@shipment_methods'
        );
        $events->listen(
            'App\Events\Cart\Payment\CollectMethods',
            'App\Handlers\Events\CartHandler@payment_methods'
        );
    }

}