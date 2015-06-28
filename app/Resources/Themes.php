<?php
namespace App\Resources;

use App\Store;
use Illuminate\Contracts\Support\Arrayable;

class Themes implements Arrayable
{

    public function toArray()
    {
        $options = [];

        foreach(entity('theme')->all() as $theme){

            $options[$theme->id] = $theme->name;

        }

        return $options;
    }

}