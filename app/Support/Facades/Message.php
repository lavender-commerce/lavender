<?php
namespace App\Support\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Message
 * @package App\Support\Facades
 * @method static addSuccess    $message
 * @method static addWarning    $message
 * @method static addNotice     $message
 * @method static addError      $message
 */
class Message extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'message.service';
    }
}
