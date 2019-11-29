<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Mvc\Controller;

class BaseController extends Controller
{
    public $controller;

    public function initialize()
    {
        $this->controller = $this->router->getControllerName();

        $this->templateCss();
        $this->templateJs();
    }

    public function indexAction()
    {
        $this->authorized();
    }

    public function authorized()
    {
        if (!$this->isLoggedIn()) {
            return $this->response->redirect('dashboard/admin');
        }
    }

    public function isLoggedIn()
    {
        // Check if the variable is defined
        if ($this->session->has('AUTH_NAME') and $this->session->has('AUTH_EMAIL') and $this->session->has('AUTH_CREATED') and $this->session->has('AUTH_UPDATED')) {
            return true;
        }
        return false;
    }

    public function set_content($view)
    {
        if (file_exists($this->view->getViewsDir() . $view . '.volt')) {
            $this->view->pick($this->controller . '/template/index');
            $this->view->content = $view;
            return true;
        } else { // Return 404
            if ($this->controller == 'admin') {
                $this->view->pick($this->controller . '/template/index');
                return false;
            }
            $this->view->content = $this->controller . '/template/404';
            return false;
        }
    }

    public function set_pnotify($title, $string, $type)
    {
        $this->session->set_flashdata('pnotify', '<body onload="new PNotify({
                                  title: \'' . $title . '\',
                                  text: \'' . $string . '\',
                                  type: \'' . $type . '\',
                                  styling: \'bootstrap3\'
                              });">
    
  </body>');
    }

    public function route404Action()
    {
        $this->view->pick('dashboard/template/404');
    }

    public function templateCss()
    {
        // Admin Style
        $this->assets->collection('admin')
            ->setTargetPath('css/theme.css')
            ->setTargetUri("css/theme.css")
            ->addCss('assets/' . $this->controller . '/vendor/fontawesome-free/css/all.min.css', true)
            ->addCss('assets/' . $this->controller . '/css/fa.css', true)
            ->addCss('assets/' . $this->controller . '/css/onoff.css', true)
            ->addCss('assets/' . $this->controller . '/css/sb-admin-2.min.css', true)
            ->addCss('assets/' . $this->controller . '/vendor/datatables/dataTables.bootstrap4.min.css', true)
            ->addCss('assets/' . $this->controller . '/vendor/select2/css.css', true)
            ->addCss('assets/' . $this->controller . '/vendor/pnotify/dist/pnotify.css', true)
            ->addCss('assets/' . $this->controller . '/vendor/pnotify/dist/pnotify.buttons.css', true)
            ->addCss('assets/' . $this->controller . '/vendor/pnotify/dist/pnotify.nonblock.css', true)
            ->join(true);

        // Dashboard Style
        $this->assets->collection('dashboard')
            ->setTargetPath('css/theme.css')
            ->setTargetUri("css/theme.css")
            ->addCss('assets/' . $this->controller . '/css/vendors.css', true)
            ->addCss('assets/' . $this->controller . '/css/style.css', true)
            ->join(true);
    }

    public function templateJs()
    {
        $this->assets->collection('adminJs')
            ->addJs('assets/' . $this->controller . '/vendor/jquery/jquery.min.js', true)
            ->addJs('assets/' . $this->controller . '/vendor/bootstrap/js/bootstrap.bundle.min.js', true)
            ->addJs('assets/' . $this->controller . '/vendor/jquery-easing/jquery.easing.min.js', true)
            ->addJs('assets/' . $this->controller . '/js/sb-admin-2.min.js', true)
            ->addJs('assets/' . $this->controller . '/vendor/chart.js/Chart.min.js', true)
            ->addJs('assets/' . $this->controller . '/vendor/datatables/jquery.dataTables.min.js', true)
            ->addJs('assets/' . $this->controller . '/vendor/datatables/dataTables.bootstrap4.min.js', true)
            ->addJs('assets/' . $this->controller . '/js/demo/chart-area-demo.js', true)
            ->addJs('assets/' . $this->controller . '/js/demo/chart-pie-demo.js', true)
            ->addJs('assets/' . $this->controller . '/vendor/select2/js.js', true)
            ->addJs('assets/' . $this->controller . '/vendor/pnotify/dist/pnotify.js', true)
            ->addJs('assets/' . $this->controller . '/vendor/pnotify/dist/pnotify.buttons.js', true)
            ->addJs('assets/' . $this->controller . '/vendor/pnotify/dist/pnotify.nonblock.js', true);

        $this->assets->collection('dashboardJs')
            ->addJs('assets/' . $this->controller . '/js/vendors.js', true)
            ->addJs('assets/' . $this->controller . '/js/active.js', true);
    }
}
