<?php
namespace App\Handlers\Forms;

class BackendHandler
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
            'App\Form\Backend\Entity\Store',
            'App\Handlers\Forms\Backend\EditStore@handle_store',
            10
        );
        $events->listen(
            'App\Form\Backend\Entity\Product',
            'App\Handlers\Forms\Backend\EditProduct@handle_product',
            10
        );
        $events->listen(
            'App\Form\Backend\Entity\Product\Categories',
            'App\Handlers\Forms\Backend\EditProduct@handle_categories',
            10
        );
        $events->listen(
            'App\Form\Backend\Entity\Category',
            'App\Handlers\Forms\Backend\EditCategory@handle_category',
            10
        );
        $events->listen(
            'App\Form\Backend\Config\General',
            'App\Handlers\Forms\Backend\EditConfig@handle_general',
            10
        );
        $events->listen(
            'App\Form\Backend\Config\Account',
            'App\Handlers\Forms\Backend\EditConfig@handle_account',
            10
        );
    }

}