<?php
namespace App\Form\Backend\Entity;

use App\Form\Backend\Entity;

class Store extends Entity
{

    public $store;

    public function __construct($params)
    {
        $this->store = $params->entity;

        $this->addField('default', [
            'label' => 'Default Store',
            'value' => $this->store->default,
            'type' => 'select',
            'resource' => 'yesno',
        ]);

        $this->addField('theme', [
            'label' => 'Theme',
            'type' => 'select',
            'validate' => ['required'],
            'resource' => 'themes',
        ]);

        $this->addField('root_category', [
            'label' => 'Root Category',
            'type' => 'select',
            'validate' => ['required'],
            'resource' => 'root_categories',
        ]);

        parent::__construct($params);
    }

}