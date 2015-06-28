<?php
use Lavender\Database\Attribute;
use Lavender\Database\Relationship;
use Lavender\Database\Scope;
return [

    'admin' => [
        'class' => 'App\Database\Admin',
        'attributes' => [
            'email' => [
                'label' => 'Email',
                'unique' => true,
            ],
            'password' => [
                'label' => 'Password',
            ],
            'remember_token' => [
                'label' => 'Remember Token',
                'nullable' => true,
            ],
        ],
    ],

    'cart' => [
        'class' => 'App\Database\Cart',
        'scope' => Scope::STORE,
        'attributes' => [
            'status' => [
                'label' => 'Status',
                'default' => 'open',
            ],
        ],
        'relationships' => [
            'customer' => [
                'entity' => 'customer',
                'type' => Relationship::BELONGS_TO,
            ],
            'items' => [
                'entity' => 'cart_item',
                'type' => Relationship::HAS_MANY,
            ],
            'shipments' => [
                'entity' => 'cart_shipment',
                'type' => Relationship::HAS_MANY,
            ],
            'payments' => [
                'entity' => 'cart_payment',
                'type' => Relationship::HAS_MANY,
            ],
        ],
    ],

    'cart_item' => [
        'class' => 'App\Database\Cart\Item',
        'scope' => Scope::STORE,
        'attributes' => [
            'qty' => [
                'label' => 'Qty',
                'type' => Attribute::INTEGER,
            ],
            'total' => [
                'label' => 'Total',
                'type' => Attribute::DECIMAL,
            ],
        ],
        'relationships' => [
            'cart' => [
                'entity' => 'cart',
                'type' => Relationship::BELONGS_TO,
            ],
            'product' => [
                'entity' => 'product',
                'type' => Relationship::BELONGS_TO,
            ],
        ],
    ],

    'cart_shipment' => [
        'class' => 'App\Database\Cart\Shipment',
        'attributes' => [
            'method' => [
                'label' => 'Method'
            ],
            'number' => [
                'label' => 'Shipment Number',
                'type' => Attribute::INTEGER,
            ],
            'total' => [
                'label' => 'Total',
                'type' => Attribute::DECIMAL,
            ],
        ],
        'relationships' => [
            'cart' => [
                'entity' => 'cart',
                'type' => Relationship::BELONGS_TO,
            ],
            'address' => [
                'entity' => 'customer_address',
                'type' => Relationship::BELONGS_TO,
            ],
            'items' => [
                'entity' => 'cart_item',
                'type' => Relationship::HAS_MANY,
            ],
        ],
    ],

    'cart_payment' => [
        'class' => 'App\Database\Cart\Payment',
        'attributes' => [
            'method' => [
                'label' => 'Method'
            ],
            'number' => [
                'label' => 'Payment Number',
                'type' => Attribute::INTEGER,
            ],
            'total' => [
                'label' => 'Total',
                'type' => Attribute::DECIMAL,
            ],
        ],
        'relationships' => [
            'cart' => [
                'entity' => 'cart',
                'type' => Relationship::BELONGS_TO,
            ],
            'address' => [
                'entity' => 'customer_address',
                'type' => Relationship::BELONGS_TO,
            ],
        ],
    ],

    'category' => [
        'class' => 'App\Database\Category',
        'scope' => Scope::DEPARTMENT,
        'attributes' => [
            'name' => [
                'label' => 'Name',
            ],
            'description' => [
                'label' => 'Description',
                'type' => Attribute::TEXT,
            ],
            'url' => [
                'label' => 'Url',
                'handler' => 'App\Handlers\Attributes\Category\Url'
            ],
        ],
        'relationships' => [
            'products' => [
                'entity' => 'product',
                'type' => Relationship::HAS_PIVOT,
                'table' => 'catalog_category_product',
            ],
            'parent' => [
                'entity' => 'category',
                'type' => Relationship::BELONGS_TO,
            ],
            'children' => [
                'entity' => 'category',
                'type' => Relationship::HAS_MANY,
            ],

        ],

    ],

    'customer' => [
        'class' => 'App\Database\Customer',
        'scope' => Scope::STORE,
        'attributes' => [
            'email' => [
                'label' => 'Email',
            ],
            'password' => [
                'label' => 'Password',
            ],
            'confirmation_code' => [
                'label' => 'Confirmation Code',
            ],
            'remember_token' => [
                'label' => 'Remember Token',
                'nullable' => true,
            ],
            'confirmed' => [
                'label' => 'confirmed',
                'type' => Attribute::BOOL,
                'default' => false,
            ],
        ],
        'relationships' => [
            'cart' => [
                'entity' => 'cart',
                'type' => Relationship::HAS_MANY,
            ],
            'address' => [
                'entity' => 'customer_address',
                'type' => Relationship::BELONGS_TO,
            ],
        ],
    ],

    'customer_address' => [
        'class' => 'App\Database\Customer\Address',
        'attributes' => [
            'name' => [
                'label' => 'Name',
            ],
            'street_1' => [
                'label' => 'Street 1',
            ],
            'street_2' => [
                'label' => 'Street 2',
            ],
            'city' => [
                'label' => 'City',
            ],
            'region' => [
                'label' => 'Region',
            ],
            'country' => [
                'label' => 'Country',
            ],
            'postcode' => [
                'label' => 'Postcode',
            ],
            'phone' => [
                'label' => 'Phone',
            ],
        ],
        'relationships' => [
            'customer' => [
                'entity' => 'customer',
                'type' => Relationship::BELONGS_TO,
            ]
        ],
    ],

    'product' => [
        'class' => 'App\Database\Product',
        'scope' => Scope::STORE,
        'attributes' => [
            'sku' => [
                'label' => 'Sku',
            ],
            'name' => [
                'label' => 'Name',
            ],
            'price' => [
                'label' => 'Price',
                'type' => Attribute::DECIMAL,
                'default' => 0.00,
            ],
            'url' => [
                'label' => 'Url',
                'handler' => 'App\Handlers\Attributes\Product\Url'
            ],
            'special_price' => [
                'label' => 'Special Price',
                'type' => Attribute::DECIMAL,
                'default' => 0.00,
            ],
        ],
        'relationships' => [
            'categories' => [
                'entity' => 'category',
                'type' => Relationship::HAS_PIVOT,
                'table' => 'catalog_category_product',
            ],
        ],
    ],

    'reminder' => [
        'class' => 'App\Database\Reminder',
        'scope' => Scope::STORE,
        'attributes' => [
            'email' => [
                'label' => 'Email',
            ],
            'token' => [
                'label' => 'Token',
            ],
            'created_at' => [
                'label' => 'Created At',
                'type' => Attribute::TIMESTAMP,
            ],
        ],
    ],

    'store' => [
        'class' => 'App\Database\Store',
        'attributes' => [
            'default' => [
                'label' => 'Default store',
                'type' => Attribute::BOOL,
                'default' => false,
            ],
        ],
        'relationships' => [
            'root_category' => [
                'entity' => 'category',
                'type' => Relationship::BELONGS_TO,
            ],
            'theme' => [
                'entity' => 'theme',
                'type' => Relationship::BELONGS_TO,
            ],
            'config' => [
                'entity' => 'store_config',
                'type' => Relationship::HAS_MANY,
            ],
        ],
    ],

    'store_config' => [
        'class' => 'App\Database\Store\Config',
        'scope' => Scope::STORE,
        'attributes' => [
            'key' => [
                'label' => 'Key',
            ],
            'value' => [
                'label' => 'Value',
            ],
        ],
        'relationships' => [
            'store' => [
                'entity' => 'store',
                'type' => Relationship::HAS_ONE,
            ],
        ],
    ],

    'theme' => [
        'class' =>  'App\Database\Theme',
        'attributes' => [
            'code' => [
                'label' => 'Code',
                'unique' => true,
            ],
            'name' => [
                'label' => 'Name',
            ],
        ],
        'relationships' => [
            'parent' => [
                'entity' => 'theme',
                'type' => Relationship::HAS_ONE,
            ],
        ],
    ],

];
