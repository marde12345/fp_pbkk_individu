<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

class DashboardController extends BaseController
{
    public function indexAction()
    {
        $this->set_content('dashboard/index');
    }
}
