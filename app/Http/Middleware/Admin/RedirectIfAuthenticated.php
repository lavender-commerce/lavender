<?php
namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated {


	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (Auth::admin()->check())
		{
			return redirect()->guest('backend');
		}

		return $next($request);
	}

}
