<?php

$config = [
    "database" => [
            "host" => "localhost",
            "port" => 3306,
        "database" => "phlog",
        "username" => "root",
        "password" => "toor"
    ],
    'routes' => require __DIR__ . '/routing.php'
];

return $config;
