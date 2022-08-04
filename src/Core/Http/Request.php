<?php

namespace Core\Http;

use Core\Parameters;

require_once __DIR__ . '/../Parameters.php';

class Request
{
    private static $instance = null;

    public $request = null;

    public function getRequest(): Parameters {
        return $this->request;
    }

    public function load()
    {
        $data = [
            'environment' => new Parameters($_ENV),
            'session' => new Parameters($_SESSION),
            'cookie' => new Parameters($_COOKIE),
            'server' => new Parameters($_SERVER),
            'query' => new Parameters($_GET),
            'post' => new Parameters($_POST),
            'request' => new Parameters($_REQUEST),
            'files' => new Parameters($_FILES),
        ];

        $this->request = new Parameters();
        $this->request->setData($data);
    }

    public function getEnvironment(): Parameters {
        return $this->getRequest()->get('environment');
    }
    public function getSession(): Parameters {
        return $this->getRequest()->get('session');
    }
    public function getCookie(): Parameters {
            return $this->getRequest()->get('cookie');
    }
    public function getServer(): Parameters {
            return $this->getRequest()->get('server');
    }
    public function getQuery(): Parameters {
            return $this->getRequest()->get('query');
    }
    public function getPost(): Parameters {
            return $this->getRequest()->get('post');
    }
    public function getReq(): Parameters {
            return $this->getRequest()->get('request');
    }
    public function getFiles(): Parameters {
            return $this->getRequest()->get('files');
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
