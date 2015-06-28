<?php
namespace App\Providers;

use Lavender\Support\ServiceProvider;
use App\Services\MessageBag;

class MessageServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'message.service',
        ];
    }

    public function boot()
    {
        $this->app->view->composer(
            'layouts.partials.messages',
            'App\Http\Composers\Partials\MessageComposer'
        );

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerMessageBag();
    }

    private function registerMessageBag()
    {
        $this->app->singleton('message.service', function ($app){

            return new MessageBag();

        });

    }

}

