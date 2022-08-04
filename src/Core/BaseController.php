<?php

namespace Core;

require_once __DIR__ . '/Http/Response.php';

use Core\Http\Response;

class BaseController
{
    public function render($view, $data = [], $code = 200, $headers = []) {
        $response = new Response();
        $response->code = $code;
        $response->headers = $headers;
        $response->body = '';

        if(file_exists(__DIR__ . "/../Views/{$view}.php")) {
            ob_start();
            extract($data, EXTR_OVERWRITE);
            require __DIR__ . "/../Views/{$view}.php";
            $response->body = ob_get_clean();
        }

        return $response;
    }
}
