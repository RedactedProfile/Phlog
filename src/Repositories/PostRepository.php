<?php

namespace Repositories;

use Helpers\Database;
use Models\Post;

require_once __DIR__ . '/../Helpers/Database.php';
require_once __DIR__ . '/../Models/Post.php';

class PostRepository
{
    public static function getPosts()
    {
        $db = Database::Get()->getConnection();

        $posts = [];

        $query = 'SELECT * FROM posts WHERE published = 1 AND NOW() > date_published ORDER BY date_published DESC';
        foreach($db->query($query) as $row) {
            $posts[] = new Post($row);
        }

        return $posts;
    }

    public static function getPost($id)
    {
        $db = Database::Get()->getConnection();

        $post = [];

        $query = 'SELECT * FROM posts WHERE id = :id AND published = 1 AND NOW() > date_published';
        $h = $db->prepare($query);
        $h->execute([':id' => $id]);
        $posts = $h->fetchAll();

        foreach($posts as $row) {
            $post = new Post($row);
        }

        return $post;
    }
}
