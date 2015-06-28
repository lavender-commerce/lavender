<?php
namespace App\Form\Admin;

use Lavender\Support\Form;

class Login extends Form
{

    public function __construct($params)
    {
        $this->addField('email', [
            'label' => 'Email',
            'type' => 'text',
            'validate' => ['required', 'email'],
            'flash' => false,
        ]);

        $this->addField('password', [
            'label' => 'Password',
            'type' => 'password',
            'validate' => ['required'],
            'comment' => "<a href='".url('backend/forgot_password')."'>Forgot your password?</a>",
            'flash' => false,
        ]);

        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Login',
            'options' => ['type' => 'submit']
        ]);
    }

}
