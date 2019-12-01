<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Init\Dashboard\Models\Users;
use Phalcon\Http\Request;

class DashboardController extends BaseController
{
    public function indexAction()
    {
        $this->set_content('index');
    }

    public function loginAction()
    {
        $this->set_content('login');
    }

    public function registerAction()
    {
        $request = new Request();

        if ($request->getPost()) {
            // Save action
            var_dump($request->getPost());
            exit;
        }

        // Show register
        $this->set_content('register');
    }
}
