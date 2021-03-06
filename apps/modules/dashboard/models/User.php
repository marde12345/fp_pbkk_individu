<?php

namespace Phalcon\Init\Dashboard\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Query;
use Phalcon\Mvc\Model\Manager;
use Phalcon\Mvc\Model\Validator\Uniqueness;


class User extends Model
{
    public $id_user;
    public $username;
    public $password;
    public $name;
    public $email;
    public $role;
    public $last_login;
    public $phone;
    public $address;
    public $photo;
    public $verifcode;
    public $userstatus;

    public function initialize()
    {
        $this->setSource('user');
    }

    public function getSource()
    {
        return 'user';
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getId()
    {
        return $this->id_user;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getRole()
    {
        return $this->role;
    }
}
