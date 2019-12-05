<?php

namespace Phalcon\Init\Dashboard\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Query;
use Phalcon\Mvc\Model\Manager;
use Phalcon\Mvc\Model\Validator\Uniqueness;


class User extends Model
{
    public $ID_USER;
    public $USERNAME;
    public $PASSWORD;
    public $NAME;
    public $EMAIL;
    public $ROLE;
    public $LAST_LOGIN;

    public function initialize()
    {
        $this->setSource('users');
    }

    public function getSource()
    {
        return 'users';
    }

    public function getPassword()
    {
        return $this->PASSWORD;
    }
    public function getUsername()
    {
        return $this->USERNAME;
    }
    public function getId()
    {
        return $this->ID_USER;
    }
    public function getEmail()
    {
        return $this->EMAIL;
    }
    public function getName()
    {
        return $this->NAME;
    }
    public function getRole()
    {
        return $this->ROLE;
    }
}
