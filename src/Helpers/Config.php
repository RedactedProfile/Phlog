<?php

namespace Helpers;

require_once 'Parameters.php';

class Config
{
    private static $instance = null;

    public $config = null;

    public function load()
    {
        $data = file_get_contents( __DIR__ . '/../../config.json');
        $this->config = new Parameters(json_decode($data, true));
    }

    public static function Get()
    {
        if(!self::$instance) {
            self::$instance = new self();
            self::$instance->load();
        }

        return self::$instance;
    }
}
