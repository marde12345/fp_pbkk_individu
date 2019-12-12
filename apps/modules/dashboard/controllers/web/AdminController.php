<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Init\Dashboard\Models\Sellers;
use Phalcon\Init\Dashboard\Models\Users;
use Phalcon\Mvc\View;
use App\Forms;
use App\Forms\Blog;
use App\Forms\Kategori;
use App\Forms\RegisterSellerAdminForm;
use Phalcon\Init\Dashboard\Models\Blog as PhalconBlog;
use Phalcon\Init\Dashboard\Models\Kategori as PhalconKategori;

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
                $this->set_pnotify('success', 'Berhasil menambahkan ' . $user->getName() . ' kedalam aplikasi');
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
                $this->set_pnotify('error', 'Berhasil Menghapus ' . $user->getName);
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
        $form = new RegisterSellerAdminForm();
        $this->view->form = $form;
        $this->set_content('buyeradd');
    }

    public function buyerVCAAction()
    {
        $buyer = new Users();
        $res = $buyer->getUserStatus();

        $this->set_content('buyervca');
        $this->view->data = $res;
    }

    public function addbuyerAction()
    {
        if ($this->request->getPost()) {
            // Save action
            $user = new Sellers();
            $form = new RegisterSellerAdminForm();
            $form->bind($_POST, $user);

            $user->password = $this->security->hash('123');
            $user->role = 'user';
            $user->last_login = date("d-m-Y H:i:s");
            $user->verifcode = $this->security->hash($user->getName());
            $user->userstatus = 0;

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
                $this->set_pnotify('success', 'Berhasil menambahkan ' . $user->getName() . ' kedalam aplikasi');
                return $this->response->redirect('admin/buyershow');
            }
            $this->set_pnotify('error', 'Coba hubungi admin');
            return $this->response->redirect('admin/buyeradd');
        }
    }

    public function delbuyerAction()
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
                $this->set_pnotify('error', 'Berhasil Menghapus ' . $user->getName);
                return $this->response->redirect('admin/buyershow');
            }
            $this->set_pnotify('error', 'Coba hubungi admin');
            return $this->response->redirect('admin/buyershow');
        }
    }

    public function kataddAction()
    {
        $form = new Kategori();
        $this->set_content('katadd');
        $this->view->form = $form;
    }

    public function katShowAction()
    {
        $kat = new PhalconKategori();
        $res = PhalconKategori::find();

        $this->set_content('katshow');
        $this->view->data = $res;
    }

    public function addKatAction()
    {
        if ($this->request->getPost()) {
            // Save action
            $kategori = new PhalconKategori;
            $form = new Kategori;
            $form->bind(array_merge($_POST, $_FILES), $kategori);

            if (!$form->isValid(array_merge($_POST, $_FILES), $kategori)) {
                $messages = $form->getMessages();

                foreach ($messages as $message) {
                    $this->flashSession->error($message);
                }
            } elseif ($this->request->isPost()) {
                foreach ($this->request->getUploadedFiles() as $picture) {
                    if (!$picture->getError()) {
                        $filename = date("dmYHis") . $picture->getName();
                        $picture->moveTo($this->config->application['imageDir'] . 'icon_category/' . $filename);
                        $kategori->icon = $filename;

                        if ($kategori->save() === false) {
                            $messages = $kategori->getMessages();

                            foreach ($messages as $message) {
                                $this->flashSession->error($message);
                            }
                        } else {
                            $this->set_pnotify('success', 'Berhasil menambahkan ' . $kategori->kategori . ' kedalam aplikasi');
                            return $this->response->redirect('/admin/katshow');
                        }
                    }
                }
            }
            $this->set_pnotify('error', 'Ada yang aneh, coba hubungi admin');
            return $this->response->redirect('/admin/katshow');
        }
    }

    public function blogaddAction()
    {
        $form = new Blog();
        $this->set_content('blogadd');
        $this->view->form = $form;
    }

    public function blogShowAction()
    {
        $kat = new PhalconBlog();
        $res = PhalconBlog::find();

        $this->set_content('blogshow');
        $this->view->data = $res;
    }

    public function addBlogAction()
    {
        if ($this->request->getPost()) {
            // Save action
            $blog = new PhalconBlog;
            $form = new Blog;
            $form->bind(array_merge($_POST, $_FILES), $blog);

            if (!$form->isValid(array_merge($_POST, $_FILES), $blog)) {
                $messages = $form->getMessages();

                foreach ($messages as $message) {
                    $this->flashSession->error($message);
                }
            } elseif ($this->request->isPost()) {
                foreach ($this->request->getUploadedFiles() as $picture) {
                    if (!$picture->getError()) {
                        $filename = date("dmYHis") . $picture->getName();

                        $picture->moveTo($this->config->application['imageDir'] . 'blogimg/' . $filename);
                        $blog->blogimg = $filename;

                        if ($blog->save() === false) {
                            $messages = $blog->getMessages();

                            foreach ($messages as $message) {
                                $this->flashSession->error($message);
                            }
                        } else {
                            $this->set_pnotify('success', 'Berhasil menambahkan ' . $blog->title . ' kedalam aplikasi');
                            return $this->response->redirect('/admin/blogshow');
                        }
                    }
                }
            }
            $this->set_pnotify('error', 'Ada yang aneh, coba hubungi admin');
            return $this->response->redirect('/admin/blogshow');
        }
    }

    public function sesAction()
    {
        $this->checkSession();
    }
}
