<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use App\Forms\RegisterUser;
use Phalcon\Init\Dashboard\Models\Users;

class DashboardController extends BaseController
{
    public function indexAction()
    {
        $this->set_content('index');
    }

    public function loginAction()
    {
        if ($this->isLoggedIn()) {
            return $this->loginRedirect();
        }
        $this->set_content('login');
    }

    public function registerAction()
    {
        // Show register
        $this->set_content('register');
        $this->view->form = new RegisterUser();
    }

    public function loginRedirect()
    {
        $role = $this->session->get('auth');
        $role = $role['role'];
        return $this->response->redirect('dashboard/' . $role);
    }
}
