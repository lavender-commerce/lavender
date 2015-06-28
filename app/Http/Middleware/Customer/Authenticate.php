<?php
namespace App\Http\Middleware\Customer;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate {


	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (Auth::customer()->guest())
		{
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
				return redirect()->guest('customer/login');
			}
		}

		return $next($request);
	}

}
