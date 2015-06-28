<?php
namespace App\Resources;

use App\Store;
use Illuminate\Contracts\Support\Arrayable;

class RootCategories implements Arrayable
{

    public function toArray()
    {
        $options = [];

        foreach(entity('category')->whereNull('category_id')->get() as $category){

            $options[$category->id] = $category->name;

        }

        return $options;
    }

}