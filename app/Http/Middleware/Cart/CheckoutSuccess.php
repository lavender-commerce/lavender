<?php
namespace App\Http\Middleware\Cart;

use App\Cart;
use Closure;

class CheckoutSuccess
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
    public function handle($request, Closure $next)
    {
        if(!$this->cart->checkoutSuccess()){

            if ($request->ajax()){

                return response('Unauthorized.', 401);

            } else{

                return redirect()->guest('cart');

            }

        }

        return $next($request);
    }

}
