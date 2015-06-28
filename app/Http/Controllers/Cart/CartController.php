<?php
namespace App\Http\Controllers\Cart;

use App\Cart;
use App\Http\Controller\Frontend;

class CartController extends Frontend
{

	public function __construct()
	{
        $this->loadLayout();

        // Cart is not empty
        $this->middleware('cart', ['except' => 'getEmpty']);
	}

	public function getIndex(Cart $cart)
	{
        append_section(
            'cart.items',
            view('cart.partials.items')->withItems($cart->getItems())
        );

		return view('cart.page')->withTotals(['Total' => $cart->getTotal()]);
	}

	public function getEmpty()
	{
		return view('cart.empty');
	}

}
