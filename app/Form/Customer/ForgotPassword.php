<?php
namespace App\Form\Customer;

use Lavender\Support\Form;

class ForgotPassword extends Form
{

    public function __construct($params)
    {
        $this->options['action'] = url('customer/forgot_password');

        $this->addField('email', [
            'label' => 'Email',
            'type' => 'text',
            'validate' => ['required', 'email'],
        ]);
        $this->addField('submit', [
            'type' => 'button',
            'value' => 'Reset',
            'options' => ['type' => 'submit'],
        ]);
    }

}