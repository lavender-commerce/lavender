<?php

class ArtisanTest extends TestCase
{

	public function testMaintenance()
	{
        $this->artisan('down');

        $response = $this->call('GET', '/');
        $this->assertEquals(503, $response->getStatusCode());

        $this->artisan('up');

        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->getStatusCode());
	}

	public function testRoutes()
	{
        $this->artisan('route:list');
	}

}