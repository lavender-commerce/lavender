<?php
namespace App\Database;

use Lavender\Database\Entity;

class Theme extends Entity
{

    protected $entity = 'theme';

    protected $table = 'theme';

    public $timestamps = false;
}