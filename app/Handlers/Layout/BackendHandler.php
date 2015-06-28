<?php
namespace App\Handlers\Layout;

class BackendHandler
{
    /**
     * Base layout applied to all views
     *
     * @param $event
     */
    public function handle($event)
    {
        $this->header();

        $this->navigation();

        $this->layouts();
    }

    protected function navigation()
    {
        $backend_navigation = menu('top.navigation');

        $backend_navigation->add('home', [
            'href' => url('backend'),
            'text' => 'Dashboard',
        ]);

        $backend_navigation->add('catalog', [
            'href' => url('backend/catalog'),
            'text' => 'Catalog',
            'children' => [
                [
                    'href' => url('backend/product'),
                    'text' => 'Products'
                ],
                [
                    'href' => url('backend/category'),
                    'text' => 'Categories'
                ],
            ]
        ]);

        $backend_navigation->add('sales', [
            'href' => url('backend/sales'),
            'text' => 'Sales',
            'children' => [
                [
                    'href' => url('backend/sales/orders'),
                    'text' => 'Orders',
                ],
                [
                    'href' => url('backend/sales/reports'),
                    'text' => 'Reports',
                ],
            ]
        ]);

        $backend_navigation->add('account', [
            'href' => url('backend/account'),
            'text' => 'Accounts',
            'children' => [
                [
                    'href' => url('backend/customer'),
                    'text' => 'Customers',
                ],
                [
                    'href' => url('backend/admin'),
                    'text' => 'Administrators',
                ],
            ]
        ]);

        $backend_navigation->add('website', [
            'href' => url('backend/website'),
            'text' => 'Website',
            'children' => [
                [
                    'href' => url('backend/store'),
                    'text' => 'Stores',
                ],
                [
                    'href' => url('backend/theme'),
                    'text' => 'Themes',
                ],
                [
                    'href' => url('backend/config'),
                    'text' => 'Config',
                    'children' => [
                        [
                            'href' => url('backend/config/import'),
                            'text' => 'Import',
                        ],
                        [
                            'href' => url('backend/config/export'),
                            'text' => 'Export',
                        ],
                    ]
                ]
            ]
        ]);
    }

    protected function store_selector()
    {
        $backend_stores = menu('header.stores');

        $current = app('App\Store');

        $stores = entity('store')->all();

        foreach($stores as $store){

            if($store->id == $current->id) continue;

            $backend_stores->add('switch-'.$store->id, [
                'href' => url('backend/store/switch/'.$store->id),
                'text' => 'Switch to store '.$store->id,
            ]);

        }
    }

    protected function header()
    {
        $backend_links = menu('header.links');

        $backend_links->add('frontend', [
            'href' => url('/'),
            'text' => 'Go to frontend',
        ]);

        $this->store_selector();
    }

    protected function layouts()
    {
        // Add stylesheets
        compose_section(
            'page.partials.head',
            'head.style',
            ['style' => 'css/util/tabs.css'],
            ['style' => 'css/util/code.css'],
            ['style' => 'css/jquery.dataTables.min.css']
        );

        // Add scripts
        compose_section(
            'page.partials.head',
            'head.script',
            ['script' => 'js/jquery-2.1.3.min.js'],
            ['script' => 'js/jquery.dataTables.min.js']
        );

        // Set logo URL
        view()->composer('page.partials.header.logo', function($view){

            $view->with('url', url('backend'));

        });

        // Add store selector
        compose_section(
            'page.partials.header',
            'header.links.after',
            ['menu' => 'header.stores']
        );
    }

}