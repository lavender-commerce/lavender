<?php
namespace App\Database;

use Lavender\Database\Entity;

class Cart extends Entity
{

    protected $entity = 'cart';

    protected $table = 'cart';


    public function findItem($item_id)
    {
        foreach($this->items as $item){

            if($item_id == $item->id) return $item;

        }

        return false;
    }

    public function scopeOpen($query)
    {
        return $query->where('status', '=', 'open');
    }
}