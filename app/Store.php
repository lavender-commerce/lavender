<?php
namespace App;

use Lavender\Contracts\Entity;
use Lavender\Support\SharedEntity;

class Store extends SharedEntity
{

    public function bootStore($store = null)
    {
        if(!$store instanceof Entity) $store = $this->findStore();

        if($store->exists) $this->setStore($store);

        return $this->exists;
    }


    public function getConfig()
    {
        return $this->getStore()->config->all();
    }

    public function getStore()
    {
        return entity('store')->find($this->id);
    }

    public function getTheme()
    {
        return $this->getStore()->theme;
    }

    public function getRootCategory()
    {
        return $this->getStore()->root_category;
    }


    public function setStore(Entity $store)
    {
        $this->setEntity($store);
    }

    protected function findStore()
    {
        $rules = config('store.store_rules');

        ksort($rules);

        foreach($rules as $rule){

            $rule = new $rule;

            if($store = $rule->match(entity('store'))){

                return $store;

            }
        }

        return $this->findDefault();
    }

    protected function findDefault()
    {
        $default = entity('store')->where('default', '=', true)->first();

        return $default ?: entity('store');
    }

    public function __get($key)
    {
        return isset($this->_data[$key]) ? $this->_data[$key] : config('store.'.$key);
    }

}