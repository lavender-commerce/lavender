<?php
namespace App\Http\Middleware\Cart;

use App\Cart;

class ReadyToCheckout
{
    protected $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        if(!$this->cart->readyToShip()){

            return redirect()->guest('cart/shipment');

        } elseif(!$this->cart->paidInFull()){

            return redirect()->guest('cart/payment');

        }

        return $next($request);
    }
}