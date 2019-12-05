<?php

namespace Phalcon\Init\BackOffice\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Init\BackOffice\Models\Users;

class LoginController extends Controller
{
    public function indexAction()
    {
        $this->view->pick('dashboard/login');
    }

    public function loginAction()
    {
        if ($this->request->getPost()) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $user = Users::findFirst([
                'conditions' => 'USERNAME = ?1',
                'bind'       => [
                    1 => $username
                ]
            ]);

            if ($user) {
                if ($this->security->checkHash($password, $user->getPassword())) {
                    $this->sessionBuilder($user);

                    return $this->response->redirect('dashboard/' . $user->getRole());
                } else {
                    $this->flashSession->error('Password salah');
                }
            } else {
                $this->flashSession->error('Belum memiliki akun');
            }
        }
        return $this->response->redirect('login');
    }

    public function sessionBuilder($user)
    {
        $this->session->set(
            'auth',
            [
                'id_user' => $user->getId(),
                'username' => $user->getUsername(),
                'role' => $user->getRole(),
                'email' => $user->getEmail(),
                'name' => $user->getName(),
            ]
        );
    }

    public function registerAction()
    {
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
                $user->LAST_LOGIN = date("d-m-Y H:i:s");

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

    public function logoutAction()
    {
        $this->session->destroy();
        $this->response->redirect('');
    }

    public function isConfirmPassValid($str1, $str2)
    {
        return strcmp($str1, $str2) == 0 ? true : false;
    }
}
