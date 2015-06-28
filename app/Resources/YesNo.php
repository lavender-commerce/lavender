<?php
namespace App\Resources;

use Illuminate\Contracts\Support\Arrayable;

class YesNo implements Arrayable
{

    public function toArray()
    {
        return [0 => 'No', 1 => 'Yes'];
    }

}