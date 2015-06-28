<?php
namespace App\Form\Cart;

use Lavender\Support\Form;

class ItemAdd extends Form
{

    public function __construct($params)
    {
        $this->options['action'] = url('cart/item/add');

        $this->addField('product_id', [
            'type' => 'hidden',
            'value' => isset($params->product) ? $params->product->id : -1,
            'validate' => ['required'],
        ]);

        $this->addField('qty', [
            'label' => 'Qty',
            'type' => 'text',
            'value' => 1,
            'validate' => ['required'],
            'options' => ['class' => 'tiny-input'],
        ]);

        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Add to Cart',
            'options' => ['type' => 'submit']
        ]);
    }

}