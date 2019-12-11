<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Init\Dashboard\Models\Sellers;
use Phalcon\Init\Dashboard\Models\Users;
use Phalcon\Mvc\View;
use App\Forms;
use App\Forms\RegisterSellerAdminForm;

class AdminController extends BaseController
{
    public function indexAction()
    {
        $this->set_content('index');
        $this->view->isi = 'Hello';
    }

    public function sellerShowAction()
    {
        $seller = new Sellers();
        $res = $seller->get();

        $this->set_content('sellershow');
        $this->view->data = $res;
    }

    public function sellerDelAction()
    {
        $seller = new Sellers();
        $res = $seller->get();

        $this->set_content('sellerdel');
        $this->view->data = $res;
    }

    public function sellerAddAction()
    {
        $form = new RegisterSellerAdminForm();
        $this->set_content('selleradd');
        $this->view->form = $form;
    }

    public function addSellerAction()
    {
        if ($this->request->getPost()) {
            // Save action
            $user = new Sellers();
            $form = new RegisterSellerAdminForm();
            $form->bind($_POST, $user);

            $user->password = $this->security->hash('123');
            $user->role = 'seller';
            $user->last_login = date("d-m-Y H:i:s");

            if (!$form->isValid($_POST, $user)) {
                $messages = $form->getMessages();

                foreach ($messages as $message) {
                    $this->flashSession->error($message);
                }
            } elseif ($user->save() === false) {
                $messages = $user->getMessages();

                foreach ($messages as $message) {
                    $this->flashSession->error($message);
                }
            } else {
                $this->set_pnotify('success', 'Berhasil menambahkan ' . $user->NAME . ' kedalam aplikasi');
                return $this->response->redirect('/admin/sellershow');
            }
            $this->set_pnotify('error', 'Ada yang aneh, coba hubungi admin');
            return $this->response->redirect('/admin/selleradd');
        }
    }

    public function delSellerAction()
    {
        if ($this->request->getPost()) {
            // Delete action
            $id_user = $this->request->getPost('id_user');
            $user = Users::find([
                'conditions' => 'id_user = ?1',
                'bind'       => [
                    1 => $id_user
                ]
            ]);

            if ($user->delete() === false) {
                $messages = $user->getMessages();

                foreach ($messages as $message) {
                    $this->flashSession->error($message);
                }
            } else {
                $this->set_pnotify('error', 'Berhasil Menghapus ' . $user->NAME);
                return $this->response->redirect('/admin/sellershow');
            }
            $this->set_pnotify('error', 'Coba hubungi admin');
            return $this->response->redirect('/admin/sellershow');
        }
    }

    public function buyerShowAction()
    {
        $buyer = new Users();
        $res = $buyer->get();

        $this->set_content('buyershow');
        $this->view->data = $res;
    }

    public function buyerDelAction()
    {
        $buyer = new Users();
        $res = $buyer->get();

        $this->set_content('buyerdel');
        $this->view->data = $res;
    }

    public function buyerAddAction()
    {
        $this->set_content('buyeradd');
    }

    public function addbuyerAction()
    {
        if ($this->request->getPost()) {
            // Save action
            $user = new Users();
            $user->USERNAME = $this->request->getPost('username');
            $user->PASSWORD = $this->security->hash('123');
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
                $this->set_pnotify('Tambah Pembeli', 'Berhasil menambahkan ' . $user->NAME . 'kedalam aplikasi', 'success');
                return $this->response->redirect('admin/buyershow');
                // return $this->dispatcher->forward([
                //     'action' => 'buyershow',
                // ]);
            }
            $this->set_pnotify('Ada yang aneh', 'Coba hubungi admin', 'error');
            return $this->dispatcher->forward([
                'action' => 'buyeradd',
            ]);
        }
    }

    public function delbuyerAction()
    {
        if ($this->request->getPost()) {
            // Delete action
            $id_user = $this->request->getPost('id_user');
            $user = Users::find([
                'conditions' => 'ID_USER = ?1',
                'bind'       => [
                    1 => $id_user
                ]
            ]);

            if ($user->delete() === false) {
                $messages = $user->getMessages();

                foreach ($messages as $message) {
                    $this->flashSession->error($message);
                }
            } else {
                $this->set_pnotify('Hapus Pembeli', 'Berhasil Menghapus ' . $user->NAME, 'error');
                return $this->dispatcher->forward([
                    'action' => 'buyershow',
                ]);
            }
            $this->set_pnotify('Ada yang aneh', 'Coba hubungi admin', 'error');
            return $this->dispatcher->forward([
                'action' => 'buyershow',
            ]);
        }
    }

    public function sesAction()
    {
        $this->checkSession();
    }
}
