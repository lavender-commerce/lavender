<?php 
namespace App\Events\Layout;

use App\Events\Event;

class LoadBase extends Event
{
    public $controller;

	function __construct($controller)
    {
        $this->controller = $controller;
    }

}
