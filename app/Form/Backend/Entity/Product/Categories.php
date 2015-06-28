<?php
namespace App\Form\Backend\Entity\Product;

use App\Form\Backend\Entity;
use Lavender\Contracts\Entity as EntityContract;

class Categories extends Entity
{

    public $product;

    public function __construct($params)
    {
        $this->product = $params->entity;

        $this->options['action'] = url('backend/product/categories/'.$this->product->id);

        // todo find/make a "get relationship ids" method
        $selected = [];

        foreach($this->product->categories as $category){

            $selected[] = $category->id;

        }

        $this->addField('categories', [
            'label' => 'Category Tree',
            'type' => 'tree',
            'value' => $selected,
            'resource' => 'category_children',
        ]);

        parent::__construct($params);
    }

}