<?php
namespace App\Http\Controllers\Cart;

use App\Cart;
use App\Http\Controller\Frontend;
use Lavender\Http\FormRequest;

class ShipmentController extends Frontend
{

	public function __construct()
	{
        $this->loadLayout();

        $this->middleware('cart');
	}

    public function getIndex(Cart $cart)
    {
        // todo detect multiple shipments
        $number = 1;

        if(!$shipment = $cart->getShipment($number)){

            $shipment = entity('cart_shipment')->create([
                'number' => $number,
            ]);

            $cart->update([
                'shipments' => [$shipment]
            ]);

        }

        return redirect('cart/shipment/'.$shipment->number);
    }

    public function getShipment($number, Cart $cart)
    {
        if(!$shipment = $cart->getShipment($number)){

            // unknown shipment, start over
            return redirect('cart/shipment');

        }

        if(!$shipment->address){

            return redirect('cart/shipment/'.$shipment->number.'/address');

        }

        return view('cart.shipment.method');
    }

    public function getAddress($number, Cart $cart)
    {
        if(!$shipment = $cart->getShipment($number)){

            // unknown shipment, start over
            return redirect('cart/shipment');

        }

        return view('cart.shipment.address');
    }

    public function postShipment($number, FormRequest $request)
    {
        if(!form('shipment_method')->handle($request)){

            return redirect('cart/shipment/'.$number);

        }

        return redirect('checkout');
    }

    public function postAddress($number, FormRequest $request)
    {
        if(!form('shipment_address')->handle($request)){

            return redirect('cart/shipment/'.$number.'/address');

        }

        return redirect('checkout');
    }
}
