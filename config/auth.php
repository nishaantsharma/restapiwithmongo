<?php

return [
    'defaults' => [
        'guard' => 'api',
        'passwords' => 'customer',
    ],

    'guards' => [
        'api' => [
            'driver' => 'jwt',
            'provider' => 'customer',
        ],
    ],

    'providers' => [
        'customer' => [
            'driver' => 'eloquent',
            'model' => \App\Models\Customer::class
        ]
    ]
];
