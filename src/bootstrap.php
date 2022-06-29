<?php
session_start();

require_once __DIR__ . '/Helpers/Logger.php';
require_once __DIR__ . '/Helpers/Request.php';
require_once __DIR__ . '/Helpers/Config.php';
require_once __DIR__ . '/Helpers/Database.php';

$logger = Helpers\Logger::Get();
$logger->log('Bootstrapping application');
$config = Helpers\Config::Get();
$logger->log('Establishing Connection');
$db = Helpers\Database::Get();
$logger->log('Completed bootstrapping');
