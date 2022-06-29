<?php

namespace Helpers;

class Logger
{
    private static $instance = null;

    private $request_id = null;

    public function __construct()
    {
        
    }

    public function log($message, $context = [])
    {
        $output = [];

        $output[] = '['. (new \DateTime())->format('Y-m-d h:i:s') .']';
        $output[] = '['. $this->request_id .']';
        $output[] = $message;
        $output[] = json_encode($context);

        @file_put_contents(__DIR__ . '/../../log.log', implode(' ', $output) . PHP_EOL, FILE_APPEND);
    }

    public static function Get()
    {
        if(self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
