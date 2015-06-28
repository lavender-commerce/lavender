<?php
namespace App\Database;

use Lavender\Auth\Account;

class Admin extends Account
{

    protected $entity = 'admin';

    protected $table = 'account_admin';

    public $confirmed = true;

    // todo apply these validate rules from config (check artisan make:admin)
    public $rules = [
        'create' => [
            'username' => 'required|min:4',
            'email'    => 'required|email',
            'password' => 'required|min:4',
        ],
        'update' => [
            'username' => 'required|min:4',
            'email'    => 'required|email',
            'password' => 'required|min:4',
        ]
    ];

}