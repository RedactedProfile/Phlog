<?php

namespace Controllers;

use Helpers\BaseController;

require_once __DIR__ . '/../Helpers/BaseController.php';

class PostController
{

    public function index($id)
    {
        echo "Viewing post: {$id}";
    }

}
