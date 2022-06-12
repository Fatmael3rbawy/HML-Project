<?php

return [

    
    'guards' => [
        'supplier' => [
            'driver' => 'session',
            'provider' => 'suppliers',
        ],
    ],


    'providers' => [
        'suppliers' => [
            'driver' => 'eloquent',
            'model' => Suppliers\Models\Supplier::class,
        ]
    ]

    


];
