<?php
namespace App\Http\Controller;

use App\Events\Layout\LoadFrontend;

abstract class Frontend extends Base
{
    protected function loadLayout()
    {
        event(new LoadFrontend($this));

        parent::loadLayout();
    }
}