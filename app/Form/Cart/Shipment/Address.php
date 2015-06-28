<?php
namespace App\Form\Cart\Shipment;

use Lavender\Support\Form;

class Address extends Form
{

    public function __construct($params)
    {
        $this->addField('name', [
            'label' => 'Full Name',
            'type' => 'text',
            'validate' => ['required'],
        ]);

        $this->addField('street_1', [
            'label' => 'Street Address',
            'type' => 'text',
            'validate' => ['required'],
        ]);

        $this->addField('street_2', [
            'label' => '',
            'type' => 'text',
        ]);

        $this->addField('city', [
            'label' => 'City',
            'type' => 'text',
            'validate' => ['required'],
        ]);

        $this->addField('region', [
            'label' => 'State/Region',
            'type' => 'text',
            'validate' => ['required'],
        ]);

        $this->addField('country', [
            'label' => 'Country',
            'type' => 'text',
            'validate' => ['required'],
        ]);

        $this->addField('postcode', [
            'label' => 'Postcode',
            'type' => 'text',
            'validate' => ['required'],
        ]);

        $this->addField('phone', [
            'label' => 'Phone',
            'type' => 'text',
        ]);

        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Next',
            'options' => ['type' => 'submit']
        ]);
    }

}