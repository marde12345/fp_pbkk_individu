<?php

namespace Phalcon\Init\Dashboard\Models;

use Phalcon\Mvc\Model;

class Users extends Model
{
    public $username;
    public $password;
    public function initialize()
    {
        $this->setSource('users');
    }
}
