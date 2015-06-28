<?php
namespace App\Form;

class FrontendKernel extends Kernel
{

    protected $forms = [

        'admin_login'               => 'App\Form\Admin\Login',
        'cart_item_add'             => 'App\Form\Cart\ItemAdd',
        'cart_item_update'          => 'App\Form\Cart\ItemUpdate',
        'shipment_method'           => 'App\Form\Cart\Shipment\Method',
        'shipment_address'          => 'App\Form\Cart\Shipment\Address',
        'payment_method'            => 'App\Form\Cart\Payment\Method',
        'cart_review'               => 'App\Form\Cart\Review',

        'contact'                   => 'App\Form\Customer\Contact',
        'customer_login'            => 'App\Form\Customer\Login',
        'customer_register'         => 'App\Form\Customer\Register',
        'customer_forgot_password'  => 'App\Form\Customer\ForgotPassword',
        'customer_reset_password'   => 'App\Form\Customer\ResetPassword',

    ];

    protected $handlers = [

        'App\Handlers\Forms\Customer\ContactHandler',
        'App\Handlers\Forms\Customer\AuthHandler',
        'App\Handlers\Forms\Admin\AuthHandler',
        'App\Handlers\Forms\CartHandler',

    ];

}