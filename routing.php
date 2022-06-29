<?php

$routes = [
    'index' => [
        'route' => '',
        'controller' => '\Controllers\HomeController::index'
    ],
    'post_view' => [
        'route' => '/post/:id',
        'controller' => '\Controllers\PostController::index'
    ]
];

return $routes;
