<?php

namespace Helpers;

require_once __DIR__ . '/../Helpers/Response.php';

use Helpers\Response;

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
