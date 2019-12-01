<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Mvc\Controller;

class ShowerrorController extends Controller
{
    public function indexAction()
    {
        echo "Error Page";
    }

    public function show404Action()
    {
        $this->view->pick('showerror/404');
    }

    public function viewnotfoundAction()
    {
        $this->view->pick('showerror/viewnotfound');
    }
}
