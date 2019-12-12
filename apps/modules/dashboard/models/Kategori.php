<?php

namespace Phalcon\Init\Dashboard\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Query;
use Phalcon\Mvc\Model\Manager;
use Phalcon\Mvc\Model\Validator\Uniqueness;


class Kategori extends Model
{
    public $id_category;
    public $kategori;
    public $icon;

    public function initialize()
    {
        $this->setSource('category');
    }

    public function getSource()
    {
        return 'category';
    }
}
