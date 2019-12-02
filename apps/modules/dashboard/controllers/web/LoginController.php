<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Init\Dashboard\Models\Users;

class LoginController extends Controller
{
    public function indexAction()
    {
        $this->view->pick('dashboard/login');
    }

    public function loginAction()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = Users::findFirst(['USERNAME' => $username]);

        if ($user) {
            if ($this->security->checkHash($password, $user->getpassword())) {
                $this->session->set(
                    'auth',
                    [
                        'userName' => $user->getusername(),
                        'role' => $user->getRole()
                    ]
                );
                $this->session->set('user', $user);
                echo "Berhasil";
                // $this->flash->success("Welcome back " . $user->getusername());
                // return $this->dispatcher->forward(["controller" => "member", "action" => "search"]);
            } else {
                echo "Password salah";
                // $this->flash->error("Your password is incorrect - try again");
                // return $this->dispatcher->forward(["controller" => "user", "action" => "login"]);
            }
        } else {
            echo "Tidak ketemu";
            // $this->flash->error("That username was not found - try again");
            // return $this->dispatcher->forward(["controller" => "user", "action" => "login"]);
        }
        // return $this->dispatcher->forward(["controller" => "index", "action" => "index"]);

        exit;
    }
}
