<?php
namespace App\Http\Composers\Partials;

use App\Support\Facades\Message;

class MessageComposer
{

    public function compose($view)
    {
        $messages = [];

        foreach(config('store.message_types') as $type){

            $message = Message::get($type);

            if($message->getMessages()) $messages[$type] = $message;

        }


        $view->with('messages', $messages);
    }

}