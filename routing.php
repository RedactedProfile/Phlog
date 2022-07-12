<?php

$routes = [
    'index' => [
        'route' => '',
        'controller' => '\Controllers\HomeController::index'
    ],
    'post_view' => [
        'route' => '/post/:id',
        'controller' => '\Controllers\PostController::index'
    ],
    'about' => [
        'route' => '/about',
        'controller' => '\Controllers\HomeController::about'
    ]
];

return $routes;
