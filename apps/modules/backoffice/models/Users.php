<?php

namespace Phalcon\Init\BackOffice\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Query;
use Phalcon\Mvc\Model\Manager;
use Phalcon\Mvc\Model\Validator\Uniqueness;


class Users extends Model
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

    public function cobe()
    {
        // $cars = $this->modelsManager->executeQuery(
        //     'SELECT * FROM Models\Users'
        // );
        // $query = new Query(
        //     'SELECT * FROM Users',
        //     $this->getDI()
        // );

        $cars = Users::query()
            ->where('USERNAME = :username:')
            ->bind(['username' => 'marde12345'])
            ->execute();
        // // Execute the query returning a result if any
        // $cars = $query->execute();
        var_dump($cars);

        // $sql = "Select * from `users`";
        // var_dump($this->getReadConnection()->fetchAll($sql));
        // $query = 'SELECT * FROM users';

        // // // Execute the query returning a result if any
        // // $cars = $this->db->execute($query);
        // var_dump($this->getDI()->get('modelsManager')->executeQuery($query)->getFirst());
        exit;
    }
}
