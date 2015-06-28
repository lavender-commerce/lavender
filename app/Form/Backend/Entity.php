<?php
namespace App\Form\Backend;

use Lavender\Support\Form;

abstract class Entity extends Form
{

    public function __construct($params)
    {
        $entity = $params->entity;

        $this->addField('id', [
            'type' => 'hidden',
            'value' => $entity->id,
        ]);

        $this->addField('entity', [
            'type' => 'hidden',
            'value' => $entity->getEntityName(),
        ]);

        $this->addField('submit', [
            'type' => 'submit',
            'value' => 'Save',
            'options' => ['type' => 'submit']
        ]);
    }

}