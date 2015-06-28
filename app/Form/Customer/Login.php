<?php
namespace App\Form\Customer;

use Lavender\Support\Form;

class Login extends Form
{

    public function __construct($params)
    {
        $this->addField('email', [
            'label' => 'Email',
            'type' => 'text',
            'validate' => ['required', 'email'],
        ]);
        $this->addField('password', [
            'label' => 'Password',
            'type' => 'password',
            'validate' => ['required'],
            'comment' => "<a href='".url('customer/forgot_password')."'>Forgot your password?</a>",
            'flash' => false,
        ]);
        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Login',
            'options' => ['type' => 'submit'],
        ]);
    }

}