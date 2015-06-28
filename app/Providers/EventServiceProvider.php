<?php
namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [

//		'Lavender\Events\Entity\QuerySelect' => [
//			'Lavender\Handlers\Events\ScopeBuilder@addStoreToSelect',
//		],
//
//		'Lavender\Events\Entity\QueryInsert' => [
//			'Lavender\Handlers\Events\ScopeBuilder@addStoreToInsert',
//		],
//
//		'Lavender\Events\Entity\PrepareSchema' => [
//			'Lavender\Handlers\Events\ScopeBuilder@addStoreToTable',
//		],

	];

	/**
	 * The subscriber classes to register.
	 *
	 * @var array
	 */
	protected $subscribe = [
		'App\Handlers\Events\StoreHandler',
		'App\Handlers\Events\LayoutHandler',
		'App\Handlers\Events\CartHandler',
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

		//
	}

}
