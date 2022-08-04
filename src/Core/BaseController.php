<?php

namespace Core;

require_once __DIR__ . '/Http/Response.php';

use Core\Http\Response;

class BaseController
{
    public function render($view, $data = [], $code = 200, $headers = []): Response {
        $response = new Response();
        $response->code = $code;
        $response->headers = $headers;
        $response->body = '';

        $view = __DIR__ . "/../App/Views/{$view}.php";
        if(file_exists($view)) {
            ob_start();
            extract($data, EXTR_OVERWRITE);
            require $view;
            $response->body = ob_get_clean();
        }

        return $response;
    }
}
