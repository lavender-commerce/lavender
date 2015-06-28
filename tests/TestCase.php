<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{

	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication()
	{
        // load the application
		$app = require __DIR__.'/../bootstrap/app.php';

        // bootstrap console kernel
		$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

        // set session storage
        Request::setSession($app['session.store']);

		return $app;
	}

}
