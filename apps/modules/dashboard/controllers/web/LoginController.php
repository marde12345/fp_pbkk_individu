<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Mvc\Controller;

class LoginController extends Controller
{
    public function indexAction()
    {
        echo "BO";
        $this->view->pick('index');
    }

    public function loginAction()
    {
        $this->view->pick('dashboard/login');
    }
}
