<?php
namespace App\Form\Backend\Entity;

use App\Form\Backend\Entity;

class Product extends Entity
{

    public $product;

    public function __construct($params)
    {
        $this->product = $params->entity;

        $this->addField('sku', [
            'label' => 'Sku',
            'type' => 'text',
            'validate' => ['required'],
            'value' => $this->product->sku,
        ]);

        $this->addField('name', [
            'label' => 'Name',
            'type' => 'text',
            'validate' => ['required'],
            'value' => $this->product->name,
        ]);

        $this->addField('price', [
            'label' => 'Price',
            'type' => 'text',
            'validate' => ['required'],
            'value' => $this->product->price,
        ]);

        parent::__construct($params);
    }

}