<?php
namespace App\Http\Controllers\Customer;

use App\Http\Controller\Frontend;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Frontend
{

	/**
	 * Create a new authentication controller instance.
	 */
	public function __construct()
	{
        $this->auth = Auth::customer();

		$this->middleware('auth');

        $this->loadLayout();
	}

	/**
	 * Show the application login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getIndex()
	{
		return view('customer.dashboard')->withCustomer($this->auth->get());
	}
}
