<?php

namespace Phalcon\Init\Dashboard\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Query;
use Phalcon\Mvc\Model\Manager;
use Phalcon\Mvc\Model\Validator\Uniqueness;


class Users extends User
{
    public function get()
    {
        $user = Users::find([
            'conditions' => 'role = ?1',
            'bind'       => [
                1 => 'user'
            ]
        ]);
        return $user;
    }

    public function getUserStatus()
    {
        $user = Users::find([
            'conditions' => 'role = ?1 and userstatus = 0',
            'bind'       => [
                1 => 'user'
            ]
        ]);
        return $user;
    }
}
