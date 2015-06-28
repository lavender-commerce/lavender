<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controller\Base;
use Lavender\Http\FormRequest;

class AuthController extends Base
{

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct()
	{
		$this->auth = Auth::admin();

        $this->loadLayout();
	}

	/**
	 * Show the application login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getIndex()
	{
        return redirect()->intended('/admin/login');
	}

	/**
	 * Show the application login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogin()
	{
		return view('admin.login');
	}

    /**
     * Handle a login request to the application.
     *
     * @param  FormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(FormRequest $request)
    {
        form('admin_login')->handle($request);

        return redirect()->intended('/admin/login');
    }

}
