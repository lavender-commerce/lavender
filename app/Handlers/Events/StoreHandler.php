<?php
namespace App\Handlers\Events;

use App\Store;
use Lavender\Database\Scope;

class StoreHandler
{
    protected $store;

    function __construct(Store $store)
    {
        $this->store = $store;
    }

    public function addStoreToSelect($event)
    {
        if($this->store->exists){

            $config = $event->query->config();

            if($config['scope'] == Scope::STORE){

                $event->query->where('store_id', '=', $this->store->id);
            }
        }
    }

    public function addStoreToInsert($event)
    {
        $attributes = [];

        if($this->store->exists){

            $config = $event->query->config();

            if($config['scope'] == Scope::STORE){

                $attributes['store_id'] = $this->store->id;
            }
        }

        return $attributes;
    }

    public function addStoreToTable($event)
    {
        $attributes = [];

        if($event->entity->getScope() == Scope::STORE){

            $attributes['store_id'] = ['parent' => 'store'];

        }

        return $attributes;
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen(
            'Lavender\Events\Entity\QuerySelect',
            'App\Handlers\Events\StoreHandler@addStoreToSelect'
        );

        $events->listen(
            'Lavender\Events\Entity\QueryInsert',
            'App\Handlers\Events\StoreHandler@addStoreToInsert'
        );

        $events->listen(
            'Lavender\Events\Entity\SchemaPrepare',
            'App\Handlers\Events\StoreHandler@addStoreToTable'
        );
    }

}