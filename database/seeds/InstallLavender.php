<?php

use Illuminate\Database\Seeder;

class InstallLavender extends Seeder {

    function __construct(\App\Store $store)
    {
        $this->store = $store;
    }
    /**
     * Run the database seeds.
     */
	public function run()
	{
		// only run this seed if store doesn't exist
		if(!$this->store->exists){

			// create default store
			$default_store = entity('store')->create([
				'default' => true,
			]);

			// set the current store scope
            $this->store->setStore($default_store);

			// create default theme
			$theme = entity('theme')->create([
				'code'  => 'default',
				'name'  => 'Default Theme',
			]);

			// create root category
			$category = entity('category')->create([
				'name' => 'Root Category',
			]);

			// update store
            $default_store->update([
				'theme'         => $theme,
				'root_category' => $category,
			]);

            $this->command->info("Lavender has successfully installed!");

		}
	}

}
