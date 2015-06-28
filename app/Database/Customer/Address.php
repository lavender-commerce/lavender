<?php
namespace App\Database\Customer;

use Lavender\Database\Entity;

class Address extends Entity
{

    protected $entity = 'customer_address';

    protected $table = 'account_customer_address';

}