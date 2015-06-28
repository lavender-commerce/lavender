<?php
namespace App\Form;

class BackendKernel extends Kernel
{

    protected $forms = [

        'edit_store'                => 'App\Form\Backend\Entity\Store',
        'edit_product'              => 'App\Form\Backend\Entity\Product',
        'edit_product_categories'   => 'App\Form\Backend\Entity\Product\Categories',
        'edit_category'             => 'App\Form\Backend\Entity\Category',
        'config_general'            => 'App\Form\Backend\Config\General',
        'config_account'            => 'App\Form\Backend\Config\Account',

    ];

    protected $handlers = [

        'App\Handlers\Forms\BackendHandler',

    ];

}