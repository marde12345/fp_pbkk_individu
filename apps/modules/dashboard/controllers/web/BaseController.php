<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Session\Adapter\Files;

class BaseController extends Controller
{
    public $controller;
    public $allowed;

    public function initialize()
    {
        $this->controller = $this->router->getControllerName();
        $this->allowed = (array) $this->config->controllerAllowed;

        $this->authorized();

        $this->templateCss();
        $this->templateJs();
    }

    public function authorized()
    {
        if ($this->isControllerAllowed()) {
            return true;
        }
        if (!$this->isLoggedIn()) {
            return $this->response->redirect('login');
        }
        if (!$this->isSessionController()) {
            return $this->response->redirect('dashboard/' . $_SESSION['auth']['role']);
        } elseif ($this->router->getControllerName() == 'user') {
            return $this->response->redirect('');
        }
    }

    public function isControllerAllowed()
    {
        return in_array($this->controller, $this->allowed) ? true : false;
    }

    public function isSessionController()
    {
        return ($this->router->getControllerName() == $_SESSION['auth']['role']) ? true : false;
    }

    public function isLoggedIn()
    {
        // Check if the variable is defined
        if ($this->session->has('auth')) {
            return true;
        }
        return false;
        // return true;
    }

    public function set_content($view)
    {
        $controller = $this->controller . '\\';
        $viewDir = $this->view->getViewsDir();
        $pathView = $viewDir . $controller;

        if (file_exists($pathView . $view . '.volt')) {
            $this->view->pick($controller . '/template/index');
            $this->view->content = $controller . $view;
            return true;
        } else {
            return $this->response->redirect('viewnotfound');;
        }
    }

    public function set_pnotify($type, $string)
    {
        switch ($type) {
            case 'success':
                $this->flashSession->setImplicitFlush(false)->success($string);
                break;
            case 'error':
                $this->flashSession->setImplicitFlush(false)->error($string);
                break;
            case 'notice':
                $this->flashSession->setImplicitFlush(false)->notice($string);
                break;
            case 'warning':
                $this->flashSession->setImplicitFlush(false)->warning($string);
                break;
            default:
                # code...
                break;
        }
        // $this->view->pnotify = '<body onload="new PNotify({title: \'' . $title . '\',text: \'' . $string . '\',type: \'' . $type . '\',styling: \'bootstrap3\'});"></body>';
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
            ->addCss('assets/' . $this->controller . '/vendor/pnotify/dist/pnotify.css', true)
            ->addCss('assets/' . $this->controller . '/vendor/pnotify/dist/pnotify.buttons.css', true)
            ->addCss('assets/' . $this->controller . '/vendor/pnotify/dist/pnotify.nonblock.css', true)
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
            ->addJs('assets/' . $this->controller . '/js/active.js', true)
            ->addJs('assets/' . $this->controller . '/vendor/pnotify/dist/pnotify.js', true)
            ->addJs('assets/' . $this->controller . '/vendor/pnotify/dist/pnotify.buttons.js', true)
            ->addJs('assets/' . $this->controller . '/vendor/pnotify/dist/pnotify.nonblock.js', true);
    }

    public function checkSession()
    {
        print_r($_SESSION);
        die;
    }
}
