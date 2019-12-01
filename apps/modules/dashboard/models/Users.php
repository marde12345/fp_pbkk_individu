<?php

namespace Phalcon\Init\Dashboard\Models;

use Phalcon\Mvc\Model;

class Users extends Model
{
    public $ID_USER;
    public $USERNAME;
    public $PASSWORD;
    public $NAME;
    public $EMAIL;
    public $ROLE;

    public function initialize()
    {
        $this->setSource('users');
    }
}
