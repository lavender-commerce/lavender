<?php
namespace App\Form\Cart;

use Lavender\Support\Form;

class Review extends Form
{
    public function __construct($params)
    {
        $this->addField('terms', [
            'label' => 'I agree to the terms.',
            'type' => 'checkbox',
            'value' => 1,
            'validate' => ['required'],
            'options' => ['checked' => true],
        ]);
        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Place Order',
            'options' => ['type' => 'submit']
        ]);
    }

}