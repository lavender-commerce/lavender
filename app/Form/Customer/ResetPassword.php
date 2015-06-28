<?php
namespace App\Form\Customer;

use Lavender\Support\Form;

class ResetPassword extends Form
{

    public function __construct($params)
    {
        $this->options['action'] = url('customer/reset_password');

        $this->addField('token', [
            'type' => 'hidden',
            'validate' => ['required'],
        ]);
        $this->addField('password', [
            'label' => 'Password',
            'type' => 'password',
            'validate' => ['required'],
            'flash' => false,
        ]);
        $this->addField('password_confirmation', [
            'label' => 'Confirm Password',
            'type' => 'password',
            'validate' => ['required'],
            'flash' => false,
        ]);
        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Reset',
            'options' => ['type' => 'submit'],
        ]);
    }

}