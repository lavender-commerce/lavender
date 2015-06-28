<?php
namespace App\Http\Controllers\Cart;

use App\Http\Controller\Frontend;
use Lavender\Http\FormRequest;

class ItemController extends Frontend
{

    public function postAdd(FormRequest $request)
    {
        form('cart_item_add')->handle($request);

        return redirect('cart');
    }

    public function postUpdate(FormRequest $request)
    {
        form('cart_item_update')->handle($request);

        return redirect('cart');
    }

}
