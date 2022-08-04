<?php

namespace App\Models;

require_once __DIR__ . '/../../Core/Parameters.php';

use Core\Parameters;

class Post
{
    public $id = null;
    public $author_id = null;
    public $title = null;
    public $summary = null;
    public $content = null;
    public $published = null;
    public $date_created = null;
    public $date_updated = null;
    public $date_published = null;

    public function __construct($data = null)
    {
        if($data) {
            $this->load($data);
        }
    }

    public function load($data)
    {
        $data = new Parameters($data);

        $this->id = $data->getString('id');
        $this->author_id = $data->getInt('author_id');
        $this->title = $data->getString('title');
        $this->summary = $data->getString('summary');
        $this->content = $data->get('content', null, '');
        $this->published = $data->getInt('published') === 1;
        $this->date_created = $data->getString('date_created');
        $this->date_updated = $data->getString('date_updated');
        $this->date_published = $data->getString('date_published');
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return null
     */
    public function getAuthorId()
    {
        return $this->author_id;
    }

    /**
     * @return null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return null
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @return null
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return null
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * @return null
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * @return null
     */
    public function getDateUpdated()
    {
        return $this->date_updated;
    }

    /**
     * @return null
     */
    public function getDatePublished()
    {
        return $this->date_published;
    }


}
