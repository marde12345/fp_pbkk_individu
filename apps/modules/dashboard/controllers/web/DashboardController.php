<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Init\Dashboard\Models\Users;

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
        // Show register
        $this->set_content('register');

        if ($this->request->getPost()) {
            // Check confirm password
            if ($this->isConfirmPassValid($this->request->getPost('password'), $this->request->getPost('confirm_password'))) {
                // Save action
                $user = new Users();
                $user->USERNAME = $this->request->getPost('username');
                $user->PASSWORD = $this->security->hash($this->request->getPost('password'));
                $user->NAME = $this->request->getPost('name');
                $user->EMAIL = $this->request->getPost('email');
                $user->ROLE = 'user';

                if ($user->save() === false) {
                    $messages = $user->getMessages();

                    foreach ($messages as $message) {
                        $this->flashSession->error($message);
                    }
                } else {
                    $this->flashSession->success('Register Success');
                    return $this->response->redirect('login');
                }
            } else {
                // set flash message
                $this->flashSession->error('Password must be same');
            }
            return $this->response->redirect('register');
        }
    }

    public function isConfirmPassValid($str1, $str2)
    {
        return strcmp($str1, $str2) == 0 ? true : false;
    }
}
