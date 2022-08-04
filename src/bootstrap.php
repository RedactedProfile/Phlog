<?php
session_start();

require_once __DIR__ . '/Core/Logger/Logger.php';
require_once __DIR__ . '/Core/Http/Request.php';
require_once __DIR__ . '/Core/Config.php';
require_once __DIR__ . '/Core/Database/DBAL/Database.php';
require_once __DIR__ . '/Core/Router/Router.php';

$logger = Core\Logger\Logger::Get();
$logger->log('Bootstrapping application');
$config = Core\Config::Get();
$router = Core\Router\Router::Get($config->config->getRaw('routes'));
$logger->log('Establishing Connection');
$db = Core\Database\DBAL\Database::Get();
$logger->log('Completed bootstrapping');

