<?php
namespace App\Form\Backend\Config;

use Lavender\Support\Form;

class General extends Form
{

    public $template = 'backend.partials.form';

    public function __construct($params)
    {
        $this->addField('name', [
            'label' => 'Store Name',
            'type' => 'text',
            'value' => config('store.name'),
            'use_default' => true,
        ]);
        $this->addField('url', [
            'label' => 'Store Url',
            'type' => 'text',
            'value' => config('store.url'),
            'use_default' => true,
        ]);
        $this->addField('logo', [
            'label' => 'Store Logo',
            'type' => 'text',
            'value' => config('store.logo'),
            'use_default' => true,
        ]);
        $this->addField('email', [
            'label' => 'Contact Email',
            'type' => 'text',
            'value' => config('store.email'),
            'use_default' => true,
        ]);
        $this->addField('phone', [
            'label' => 'Contact Phone',
            'type' => 'text',
            'value' => config('store.phone'),
            'use_default' => true,
        ]);
        $this->addField('address', [
            'label' => 'Business Address',
            'type' => 'text',
            'value' => config('store.address'),
            'use_default' => true,
        ]);
        $this->addField('hours', [
            'label' => 'Business Hours',
            'type' => 'text',
            'value' => config('store.hours'),
            'use_default' => true,
        ]);

        $this->addField('submit', [
            'type' => 'submit',
            'value' => 'Save',
            'options' => ['type' => 'submit']
        ]);
    }

}