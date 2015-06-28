<?php
namespace App\Database;

use Lavender\Auth\Account;

class Customer extends Account
{

    protected $entity = 'customer';

    protected $table = 'account_customer';

    public $rules = [
        'create' => [
            'email'    => 'required|email',
            'password' => 'required|min:4',
        ],
        'update' => [
            'email'    => 'required|email',
            'password' => 'required|min:4',
        ]
    ];

    public function getCart()
    {
        return $this->cart->first();
    }
}