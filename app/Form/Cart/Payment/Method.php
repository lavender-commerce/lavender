<?php
namespace App\Form\Cart\Payment;

use Lavender\Support\Form;

class Method extends Form
{
    public function __construct($params)
    {
        $this->addField('method', [
            'label'    => 'Select a payment option:',
            'type'     => 'radiolist',
            'validate' => ['required'],
            'resource' => 'payment_methods',
        ]);

        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Next',
            'options' => ['type' => 'submit']
        ]);
    }

}