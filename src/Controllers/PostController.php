<?php

namespace Controllers;

use Helpers\BaseController;

require_once __DIR__ . '/../Helpers/BaseController.php';
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
