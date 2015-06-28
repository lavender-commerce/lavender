<?php
namespace App\Http\Controllers\Cart;

use App\Cart;
use App\Http\Controller\Frontend;
use Lavender\Http\FormRequest;

class PaymentController extends Frontend
{

	public function __construct()
	{
        $this->loadLayout();

        $this->middleware('cart');

        $this->middleware('cart_shipment');
	}

    public function getIndex(Cart $cart)
    {
        // todo detect multiple payments
        $number = 1;

        if(!$payment = $cart->getPayment($number)){

            $payment = entity('cart_payment')->create([
                'number' => $number,
            ]);

            $cart->update([
                'payments' => [$payment]
            ]);

        }

        return redirect('cart/payment/'.$payment->number);
    }

    public function getPayment($number, Cart $cart)
    {
        if(!$payment = $cart->getPayment($number)){

            // unknown payment, start over
            return redirect('cart/payment');

        }

        return view('cart.payment.method');
    }


    public function postPayment($number, FormRequest $request)
    {
        if(!form('payment_method')->handle($request)){

            return redirect('cart/payment/'.$number);

        }

        return redirect('checkout');
    }
}
