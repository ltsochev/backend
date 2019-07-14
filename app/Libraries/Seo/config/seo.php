<?php

return [
    'enabled' => true,
    'site_name' => env('APP_NAME'),

    'defaults' => [
        'title' => '',
        'description' => '',

        'open_graph' => [
            'fb:app_id' => null,
        ]
    ],
];
