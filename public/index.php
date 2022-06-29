<?php

require_once __DIR__ . '/../src/bootstrap.php';

$matched_route = Helpers\Router::Get()->match(Helpers\Request::Get()->getServer()->getString('PATH_INFO'));
if(!$matched_route) {
    echo "404 not found";
    die();
}



echo "<pre>";
var_dump($matched_route);
var_dump(Helpers\Request::Get());
die();
