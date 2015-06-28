<?php
namespace App\Database\Store;

use Lavender\Database\Entity;

class Config extends Entity
{

    protected $entity = 'store_config';

    protected $table = 'store_config';

    public $timestamps = false;

}