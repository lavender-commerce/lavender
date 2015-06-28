<?php
namespace App\Http\Middleware\Cart;

use App\Cart;

class RedirectIfEmpty
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
        if(!$this->cart->getItemsCount()){

            return redirect()->guest('cart/empty');

        }

        return $next($request);
    }
}