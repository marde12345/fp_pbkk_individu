<?php
class User
{
    public $id = '';
    public $name = '';
    public $address = '';
    public function __construct()
    {
        $this->id = 1;
        $this->name = 'Buda Suyasa';
        $this->address = 'Bali';
    }
    public function getUser()
    {
        header('Content-Type: application/json');
        echo json_encode([
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address
        ]);
    }
}
$user = new User();
$user->id = 1;
$user->name = 'Buda Suyasa';
$user->address = 'Denpasar';
$user->getUser();
