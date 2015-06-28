<?php
use Illuminate\Database\Seeder;

class SampleData extends Seeder
{

    public function __construct(\App\Store $store)
    {
        $this->store = $store;
    }

    public function run()
    {
        $this->sample_catalog();

        $this->sample_blog();
    }

    protected function sample_catalog()
    {
        $data = [
            2 => [
                'name'   => 'Child Category 1',
                'parent' => ['category' => 1],
            ],
            3 => [
                'name'   => 'Child Category 2',
                'parent' => ['category' => 1],
            ],
            4 => [
                'name'   => 'Grandchild Category 1',
                'parent' => ['category' => 3],
            ],
            5 => [
                'name'   => 'Grandchild Category 2',
                'parent' => ['category' => 3],
            ],
        ];

        foreach($data as $attr){

            entity('category')->create($attr);

        }

        $pivots = [];

        $data = [
            [
                'name'       => 'Test Product 1',
                'sku'        => 'test-1',
                'price'      => 8.99,
                'categories' => ['category' => [3, 5]]
            ],
            [
                'name'          => 'Test Product 2',
                'sku'           => 'test-2',
                'price'         => 9.99,
                'special_price' => 5.99,
                'categories'    => ['category' => [2, 5]]
            ],
            [
                'name'       => 'Test Product 3',
                'sku'        => 'test-3',
                'price'      => 8.99,
                'categories' => ['category' => [3, 5]]
            ],
            [
                'name'       => 'Test Product 4',
                'sku'        => 'test-4',
                'price'      => 8.99,
                'categories' => ['category' => [3, 5]]
            ],
            [
                'name'          => 'Test Product 5',
                'sku'           => 'test-5',
                'price'         => 9.99,
                'special_price' => 5.99,
                'categories'    => ['category' => [3, 5]]
            ],
            [
                'name'       => 'Test Product 6',
                'sku'        => 'test-6',
                'price'      => 8.99,
                'categories' => ['category' => [3, 5]]
            ],
            [
                'name'       => 'Test Product 7',
                'sku'        => 'test-7',
                'price'      => 8.99,
                'categories' => ['category' => [3, 5]]
            ],
            [
                'name'          => 'Test Product 8',
                'sku'           => 'test-8',
                'price'         => 9.99,
                'special_price' => 5.99,
                'categories'    => ['category' => [3, 5]]
            ],
        ];

        foreach($data as $attr){

            $seed = entity('product')->fill($attr, false);

            $seed->save();

            $pivots[$seed->id] = $attr;

        }

        foreach($pivots as $id => $attr){

            entity('product')->find($id)->fill($attr)->save();

        }
    }

    protected function sample_blog()
    {
        // create store
        $store = entity('store')->create([
            'theme'         => ['theme' => $this->store->theme_id],
            'root_category' => ['category' => $this->store->category_id],
        ]);

        // set the current store scope
        $this->store->setStore($store);

        // set config for this store
        $config = entity('store_config')
            ->fill(['key' => 'name', 'value' => 'Lavender Blog']);

        $config->save();
    }

}