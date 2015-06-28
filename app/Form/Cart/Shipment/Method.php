<?php
namespace App\Form\Cart\Shipment;

use Lavender\Support\Form;

class Method extends Form
{
    public function __construct($params)
    {
        $this->addField('method', [
            'label'    => 'Select a shipping option:',
            'type'     => 'radiolist',
            'validate' => ['required'],
            'resource' => 'shipment_methods',
        ]);

        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Next',
            'options' => ['type' => 'submit']
        ]);
    }

}