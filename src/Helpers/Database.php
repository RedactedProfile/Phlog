<?php

namespace Helpers;

require_once 'Config.php';

class Database
{
    private static $instance = null;

    private $connection = null;

    public function connect()
    {
        $config = Config::Get()->config->get('database');
        try {
            $pdo = new \PDO("mysql:host={$config->getString('host')};dbname={$config->getString('database')}", $config->getString('username'), $config->getString('password'));
            $pdo->query("1 = 1");
            $this->connection = $pdo;
        } catch (\PDOException $e) {
            echo "Database Connection Error: " . $e->getMessage();
            die();
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public static function Get()
    {
        if(self::$instance === null) {
            self::$instance = new self();
            self::$instance->connect();
        }

        return self::$instance;
    }
}
