<?php
namespace App\Http\Controllers\Cart;

use App\Cart;
use App\Http\Controller\Frontend;
use Illuminate\Http\Request;
use Lavender\Http\FormRequest;
use Lavender\Support\Facades\Message;

class CheckoutController extends Frontend
{

	public function __construct()
	{
        $this->loadLayout();
	}

	public function getIndex()
	{
        return view('cart.review');
	}


    public function postIndex(FormRequest $request, Cart $cart)
    {
        if(!form('cart_review')->handle($request)){

            return redirect('checkout');

        }

        Message::addSuccess('Order #'.$cart->id.' has been received!');

        return redirect('cart/success');
    }
}
