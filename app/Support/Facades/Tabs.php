<?php
namespace App\Support\Facades;

use Illuminate\Support\Facades\Facade;

class Tabs extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'tabbed.content';
    }
}
