<?php
namespace App\Http\Controllers\Cart;

use App\Cart;
use App\Http\Controller\Frontend;
use Illuminate\Http\Request;

class SuccessController extends Frontend
{

	public function __construct()
	{
        $this->loadLayout();

        // Cart conversion page
        $this->middleware('cart_success');
	}

	public function getIndex()
	{
        return view('cart.success');
	}
}
