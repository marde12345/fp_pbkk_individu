<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Mvc\View;

class AdminController extends BaseController
{
    public function indexAction()
    {
        $this->set_content('dashboard/index');
        $this->view->isi = 'Hello';
    }
}
