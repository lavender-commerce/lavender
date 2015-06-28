<?php
namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession',
		'App\Http\Middleware\VerifyCsrfToken',
	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [

        // customer must be authenticated
		'auth'              => 'App\Http\Middleware\Customer\Authenticate',

        // customer must NOT be authenticated
		'guest'             => 'App\Http\Middleware\Customer\RedirectIfAuthenticated',

        // admin must be authenticated
		'backend'           => 'App\Http\Middleware\Admin\Authenticate',

        // admin must NOT be authenticated
		'admin_guest'       => 'App\Http\Middleware\Admin\RedirectIfAuthenticated',

        // cart must not be empty
		'cart'              => 'App\Http\Middleware\Cart\RedirectIfEmpty',

        // all cart requirements have been met
		'checkout'          => 'App\Http\Middleware\Cart\ReadyToCheckout',

        // cart middleware for checkout
        'cart_shipment'     => 'App\Http\Middleware\Cart\ReadyToShip',
        'cart_payment'      => 'App\Http\Middleware\Cart\PaidInFull',
        'cart_success'      => 'App\Http\Middleware\Cart\CheckoutSuccess',
	];

}
