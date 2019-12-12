<?php

namespace Phalcon\Init\Dashboard\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Query;
use Phalcon\Mvc\Model\Manager;
use Phalcon\Mvc\Model\Validator\Uniqueness;


class Blog extends Model
{
    public $id_blog;
    public $id_category;
    public $title;
    public $blogdesc;
    public $blogimg;
    public $blogstatus;

    public function initialize()
    {
        $this->setSource('blog');
    }

    public function getSource()
    {
        return 'blog';
    }
}
