<?php
namespace App\Form\Backend\Entity;

use App\Form\Backend\Entity;
use Lavender\Contracts\Entity as EntityContract;

class Category extends Entity
{

    public $category;

    public function __construct($params)
    {
        /**
         * Category Name
         */
        $this->category = $params->entity;

        $this->addField('name', [
            'label' => 'Name',
            'type' => 'text',
            'validate' => ['required'],
            'value' => $this->category->name,
        ]);

        $value = null;

        $validate = ['limit' => 1];

        if($this->category->exists){

            $parent = $this->category->parent;

            $value = $parent->exists ? $parent->id : app('store')->root_category;

            $validate['hide'] = $this->category->id;
        }

        $this->addField('parent', [
            'label' => 'Parent Category',
            'type' => 'tree',
            'value' => $value,
            'resource' => 'category_tree',
            'options' => ['data-validate' => $validate]
        ]);

        parent::__construct($params);
    }

}