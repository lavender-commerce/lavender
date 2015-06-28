<?php
namespace App\Handlers\Events;

class LayoutHandler
{
    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\Layout\LoadBase',
            'App\Handlers\Layout\BaseHandler'
        );
        $events->listen(
            'App\Events\Layout\LoadFrontend',
            'App\Handlers\Layout\FrontendHandler'
        );
        $events->listen(
            'App\Events\Layout\LoadBackend',
            'App\Handlers\Layout\BackendHandler'
        );
    }

}