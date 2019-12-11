<?php

namespace Phalcon\Init\BackOffice\Controllers\Web;

use App\Forms\RegisterUser;
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
                'conditions' => 'username = ?1',
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
            $form = new RegisterUser();
            $user = new Users();
            $form->bind($_POST, $user);

            if (!$form->isValid($_POST, $user)) {
                $messages = $form->getMessages();

                foreach ($messages as $message) {
                    $this->flashSession->error($message);
                }
            } else {
                $user->password = $this->security->hash($this->request->getPost('password'));
                $user->role = 'user';
                $user->last_login = date("d-m-Y H:i:s");

                if ($user->save() === false) {
                    $messages = $user->getMessages();

                    foreach ($messages as $message) {
                        $this->flashSession->error($message);
                    }
                } else {
                    $this->flashSession->success('Register Success');
                    return $this->response->redirect('login');
                }
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
