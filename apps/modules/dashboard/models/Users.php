<?php

namespace Phalcon\Init\Dashboard\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Query;
use Phalcon\Mvc\Model\Manager;


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

    public function getSource()
    {
        return 'users';
    }

    public function getpassword()
    {
        return $this->PASSWORD;
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
