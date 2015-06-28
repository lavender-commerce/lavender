<?php
namespace App\Http\Controller;

use App\Events\Layout\LoadBackend;
use App\Support\Facades\Message;

abstract class Backend extends Base
{
    protected $layout_loaded = false;

    protected function loadLayout()
    {
        if(!$this->layout_loaded){

            event(new LoadBackend($this));

            parent::loadLayout();

            $this->layout_loaded = true;

        }
    }

    public function missingMethod($parameters = [])
    {
        $this->loadLayout();

        Message::addError("Page not found.");

        compose_section('layouts.default', 'head.title', 'Not found');

        return view('layouts.default');
    }
}