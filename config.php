<?php

$config = [
    // Database Module
    "database" => [
            "host" => "localhost",
            "port" => 3306,
        "database" => "phlog",
        "username" => "root",
        "password" => "toor"
    ],

    // Route Module
    'routes' => require __DIR__ . '/routing.php',

    // Logging Module
    'logging' => [
        'outdir' => __DIR__ . '/logs',
        'channels' => [
            'main' => [
                'min_level' => 'info',
            ]
        ]
    ]

];

return $config;
