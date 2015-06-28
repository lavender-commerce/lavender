<?php
namespace App\Resources;

use App\Store;
use Illuminate\Contracts\Support\Arrayable;

class CategoryTree implements Arrayable
{
    protected $store;

    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    public function toArray()
    {
        $root = $this->store->getRootCategory();

        return $this->values($root);
    }

    public function toChildren()
    {
        $root = $this->store->getRootCategory();

        return $this->children($root);
    }


    protected function values($category)
    {
        return [
            'label'   => $category->name,
            'name'    => 'category',
            'value'   => $category->id,
            'children' => $this->children($category),
        ];
    }


    protected function children($category)
    {
        $results = [];

        foreach($category->children as $child){

            $results[] = $this->values($child);

        }

        return $results;
    }

}