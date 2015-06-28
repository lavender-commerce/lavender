<?php
namespace App\Http\Controllers\Customer;

use App\Http\Controller\Frontend;
use Illuminate\Support\Facades\Auth;
use Lavender\Http\FormRequest;

class AuthController extends Frontend
{

    /**
     * Create a new authentication controller instance.
     */
	public function __construct()
	{
        $this->auth = Auth::customer();

		$this->middleware('guest', ['except' => 'getLogout']);

        $this->loadLayout();
	}

	/**
	 * Show the application login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogin()
	{
		return view('customer.login');
	}

    public function getConfirm($code)
    {
        if($this->auth->confirmByCode($code)){

            \Message::addSuccess(trans('account.alerts.confirmation'));
        } else{

            \Message::addError(trans('account.alerts.wrong_confirmation'));
        }

        return redirect('/customer/login');
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        $this->auth->logout();

        return redirect('/');
    }

	/**
	 * Show the application registration form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getRegister()
	{
		return view('customer.register');
	}

	/**
	 * Show the application registration form.
	 *
     * @param FormRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function postRegister(FormRequest $request)
	{
        form('customer_register')->handle($request);

        return redirect('/customer/register');
	}

    /**
     * Handle a login request to the application.
     *
     * @param FormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(FormRequest $request)
    {
        form('customer_login')->handle($request);

        return redirect('/customer/login');
    }
}
