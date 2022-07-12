<?php

require_once __DIR__ . '/../src/bootstrap.php';

$matched_route = Helpers\Router::Get()->match(Helpers\Request::Get()->getServer()->getString('PATH_INFO'));
if(!$matched_route) {
    echo "404 not found";
    die();
}

require_once __DIR__ . '/../src/Controllers/HomeController.php';
require_once __DIR__ . '/../src/Controllers/PostController.php';

$controller = new $matched_route['controller']();
$response = call_user_func_array([$controller, $matched_route['action']], $matched_route['parameters']);

ob_start();

echo $response->body;

ob_end_flush();
die();
