<?php
namespace App\Http\Middleware\Cart;

use App\Cart;
use App\Support\Facades\Message;

class ReadyToShip
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

            Message::addWarning('Shipment is required.');

            return redirect()->guest('cart');

        }

        return $next($request);
    }
}