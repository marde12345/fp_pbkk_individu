<?php

namespace Phalcon\Init\BackOffice\Controllers\Web;

use Phalcon\Mvc\Controller;

class BackOfficeController extends Controller
{
    public function indexAction()
    {
        echo "BO";
        // $this->view->pick('dashboard/index');
    }
}
