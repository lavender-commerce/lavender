<?php
namespace App\Database;

use Lavender\Database\Entity;

class Reminder extends Entity
{

    protected $entity = 'reminder';

    protected $table = 'account_password_reminders';

    public $timestamps = false;

}