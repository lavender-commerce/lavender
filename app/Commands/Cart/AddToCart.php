<?php
namespace App\Commands\Cart;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

class AddToCart extends Command implements SelfHandling
{
    protected $cart_id;
    protected $product_id;
    protected $qty;

    /**
     * Create a new command instance.
     *
     * @param $cart_id
     * @param $product_id
     * @param $qty
     * @throws \Exception
     */
    public function __construct($cart_id, $product_id, $qty)
    {
        if(!(integer)$cart_id || !$product_id || !(integer)$qty) throw new \Exception("Invalid AddToCart request.");

        $this->cart_id = $cart_id;

        $this->product_id = $product_id;

        $this->qty = (integer)$qty;
    }

    /**
     * Execute the command.
     * todo stock check
     * @return void
     */
    public function handle()
    {
        if($cart_item = $this->hasItem()){

            $cart_item->qty += $this->qty;

        } else{

            // create new cart item
            $cart_item = entity('cart_item')->fill([
                'product' => ['product' => $this->product_id],
                'cart'    => ['cart' => $this->cart_id],
                'qty'     => $this->qty,
            ]);

        }

        // save cart item
        $cart_item->save();
    }

    protected function hasItem()
    {
        $cart = entity('cart')->find($this->cart_id);

        if($cart){

            return $cart->items()
                //todo product option/type filtering
                ->where('product_id', '=', $this->product_id)
                ->first();

        }

        return false;
    }

}
