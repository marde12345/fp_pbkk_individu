<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Mvc\View;

class UserController extends BaseController
{
    public function indexAction()
    {
        $this->set_content('index');
        $this->view->isi = 'User';
    }
}
