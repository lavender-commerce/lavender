<?php
namespace App\Http\Middleware\Admin;

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
		if(Auth::admin()->guest()){

            if($request->ajax()) return response('Unauthorized.', 401);

			return redirect()->guest('admin/login');

		}

        // Bind the Backend Kernel to our request
        // todo find a better place to register our backend form kernel
        app()->singleton(
            'Lavender\Contracts\Form\Kernel',
            'App\Form\BackendKernel'
        );

		return $next($request);
	}

}
