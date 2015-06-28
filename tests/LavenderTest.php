<?php

class LavenderTest extends TestCase
{

    /**
     * Check some of Lavender's core routes
     */
	public function testAvailability()
	{
        // home page
		$response = $this->call('GET', '/');
		$this->assertEquals(200, $response->getStatusCode());

        // cart page (redirects to login)
		$response = $this->call('GET', 'cart');
		$this->assertEquals(302, $response->getStatusCode());

        // customer page (redirects to login)
		$response = $this->call('GET', 'customer/dashboard');
		$this->assertEquals(302, $response->getStatusCode());

        // 404 page
		$response = $this->call('GET', 'this is an unknown route');
		$this->assertEquals(404, $response->getStatusCode());
	}

    /**
     * Check the entity instance of Lavender's core models
     */
    public function testInstances()
    {
        // cart instance
        $model = app('App\Cart')->getCart();
        $class = get_class(entity('cart'));
        $this->assertInstanceOf($class, $model);

        // store instance
        $model = app('App\Store')->getStore();
        $class = get_class(entity('store'));
        $this->assertInstanceOf($class, $model);

        // store instance
        $model = app('App\Theme')->getTheme();
        $class = get_class(entity('theme'));
        $this->assertInstanceOf($class, $model);
    }

    /**
     * Check the definitions of all entities
     */
	public function testEntityDefinitions()
	{
        foreach(config('entity') as $entity => $data){

            $model = entity($entity);

            $this->assertObjectHasAttribute('entity', $model);

            $this->assertObjectHasAttribute('table', $model);

            $this->assertInstanceOf('Lavender\Contracts\Entity', $model);

        }
	}

    /**
     * Forms must never accept empty request
     */
    public function testUnhandledForms()
    {
        // get form kernel
        $forms = app('Lavender\Contracts\Form\Kernel');

        foreach($forms->all() as $id => $class){

            $form = form($id)->resolve();

            // form must always resolve correctly
            $this->assertInstanceOf($class, $form);

            // create empty request
            $request = Request::create('/', 'POST', []);

            // create a form request
            $form_request = app('Lavender\Http\FormRequest');

            // set the current request
            $form_request->setRequest($request);

            // handle the form request
            $result = form($id)->handle($form_request);

            // empty request must always fail
            $this->assertEquals(false, $result, "Unhandled form \"$id\"");

        }
    }


}
