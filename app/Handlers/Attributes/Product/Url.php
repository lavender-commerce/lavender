<?php
namespace App\Handlers\Attributes\Product;

use Lavender\Database\Attribute;

class Url extends Attribute
{
    public function before_save($value)
    {
        // create unique url if one not provided
        return $value ?: uniqid();
    }

    public function value()
    {
        return url(config('url.product').'/'.parent::value());
    }
}