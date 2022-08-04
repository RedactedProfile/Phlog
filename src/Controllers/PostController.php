<?php

namespace Controllers;

use Core\BaseController;

require_once __DIR__ . '/../Core/BaseController.php';
require_once __DIR__ . '/../Repositories/PostRepository.php';

class PostController extends BaseController
{

    public function index($id)
    {
        $post = \Repositories\PostRepository::getPost($id);
        return $this->render('post', [
            'post' => $post
        ]);
    }

}
