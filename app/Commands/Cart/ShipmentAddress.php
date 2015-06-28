<?php
namespace App\Commands\Cart;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

class ShipmentAddress extends Command implements SelfHandling
{

    /**
     * Create a new instance.
     */
    public function __construct(
        $shipment,
        $name,
        $street_1,
        $street_2,
        $city,
        $region,
        $country,
        $postcode,
        $phone
    ){
        $this->shipment     = $shipment;

        $this->address = entity('customer_address')->fill([
            'name'         => $name,
            'street_1'     => $street_1,
            'street_2'     => $street_2,
            'city'         => $city,
            'region'       => $region,
            'country'      => $country,
            'postcode'     => $postcode,
            'phone'        => $phone,
        ]);
    }

    /**
     * Execute the command.
     */
    public function handle()
    {
        $this->address->save();

        $this->shipment->update([
            'address' => $this->address
        ]);
    }

}