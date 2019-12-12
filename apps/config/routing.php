<?php

$di['router'] = function () use ($defaultModule, $modules, $di, $config) {

    $router = new \Phalcon\Mvc\Router(false);
    $router->clear();

    /**
     * Default Routing
     */
    $router->add('/', [
        'namespace' => $modules[$defaultModule]['webControllerNamespace'],
        'module' => $defaultModule,
        'controller' => isset($modules[$defaultModule]['defaultController']) ? $modules[$defaultModule]['defaultController'] : 'index',
        'action' => isset($modules[$defaultModule]['defaultAction']) ? $modules[$defaultModule]['defaultAction'] : 'index'
    ]);

    /**
     * Not Found Routing
     */
    $router->notFound(
        [
            'module' => 'backoffice',
            'namespace' => 'Phalcon\Init\BackOffice\Controllers\Web',
            'controller' => 'showerror',
            'action'     => 'show404',
        ]
    );

    $router->add('/viewnotfound', array(
        'namespace' => 'Phalcon\Init\BackOffice\Controllers\Web',
        'module' => 'backoffice',
        'controller' => 'showerror',
        'action' => 'viewnotfound'
    ));
    $router->add('/sendmail/:params', [
        'namespace' => 'Phalcon\Init\BackOffice\Controllers\Web',
        'module' => 'backoffice',
        'controller' => 'backoffice',
        'action' => 'sendVCAcc',
        'params' => 1
    ]);
    $router->add('/getmail', [
        'namespace' => 'Phalcon\Init\BackOffice\Controllers\Web',
        'module' => 'backoffice',
        'controller' => 'backoffice',
        'action' => 'getVCAcc'
    ]);

    /**
     * Manual Routing
     */
    $router->add('/login', array(
        'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'module' => 'dashboard',
        'controller' => 'dashboard',
        'action' => 'login'
    ));

    $router->add('/logout', array(
        'namespace' => 'Phalcon\Init\BackOffice\Controllers\Web',
        'module' => 'backoffice',
        'controller' => 'login',
        'action' => 'logout'
    ));

    $router->addPost('/login', array(
        'namespace' => 'Phalcon\Init\BackOffice\Controllers\Web',
        'module' => 'backoffice',
        'controller' => 'login',
        'action' => 'login'
    ));

    $router->add('/register', array(
        'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'module' => 'dashboard',
        'controller' => 'dashboard',
        'action' => 'register'
    ));

    $router->addPost('/register', array(
        'namespace' => 'Phalcon\Init\BackOffice\Controllers\Web',
        'module' => 'backoffice',
        'controller' => 'login',
        'action' => 'register'
    ));
    $router->add('/admin', array(
        'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'module' => 'dashboard',
        'controller' => 'admin',
        'action' => 'index'
    ));
    $router->add('/admin/sellershow', array(
        'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'module' => 'dashboard',
        'controller' => 'admin',
        'action' => 'sellershow'
    ));
    $router->add('/admin/selleradd', array(
        'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'module' => 'dashboard',
        'controller' => 'admin',
        'action' => 'selleradd'
    ));
    $router->add('/admin/sellerdel', array(
        'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'module' => 'dashboard',
        'controller' => 'admin',
        'action' => 'sellerdel'
    ));
    $router->addPost('/admin/selleradd', array(
        'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'module' => 'dashboard',
        'controller' => 'admin',
        'action' => 'addseller'
    ));
    $router->addPost('/admin/sellerdel', array(
        'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'module' => 'dashboard',
        'controller' => 'admin',
        'action' => 'delseller'
    ));
    $router->add('/admin/buyershow', array(
        'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'module' => 'dashboard',
        'controller' => 'admin',
        'action' => 'buyershow'
    ));
    $router->add('/admin/buyeradd', array(
        'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'module' => 'dashboard',
        'controller' => 'admin',
        'action' => 'buyeradd'
    ));
    $router->add('/admin/buyerdel', array(
        'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'module' => 'dashboard',
        'controller' => 'admin',
        'action' => 'buyerdel'
    ));
    $router->addPost('/admin/buyeradd', array(
        'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'module' => 'dashboard',
        'controller' => 'admin',
        'action' => 'addbuyer'
    ));
    $router->addPost('/admin/buyerdel', array(
        'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'module' => 'dashboard',
        'controller' => 'admin',
        'action' => 'delbuyer'
    ));
    $router->add('/admin/katadd', array(
        'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'module' => 'dashboard',
        'controller' => 'admin',
        'action' => 'katadd'
    ));
    $router->add('/admin/katshow', array(
        'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'module' => 'dashboard',
        'controller' => 'admin',
        'action' => 'katshow'
    ));
    $router->addPost('/admin/addkat', array(
        'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'module' => 'dashboard',
        'controller' => 'admin',
        'action' => 'addkat'
    ));
    $router->add('/admin/blogadd', array(
        'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'module' => 'dashboard',
        'controller' => 'admin',
        'action' => 'blogadd'
    ));
    $router->add('/admin/blogshow', array(
        'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'module' => 'dashboard',
        'controller' => 'admin',
        'action' => 'blogshow'
    ));
    $router->addPost('/admin/addblog', array(
        'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'module' => 'dashboard',
        'controller' => 'admin',
        'action' => 'addblog'
    ));
    $router->add('/admin/buyervca', array(
        'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'module' => 'dashboard',
        'controller' => 'admin',
        'action' => 'buyervca'
    ));


    /**
     * End Of Manual Routing
     */


    /**
     * Module Routing
     */
    foreach ($modules as $moduleName => $module) {

        if ($module['defaultRouting'] == true) {
            /**
             * Default Module routing
             */
            $router->add('/' . $moduleName . '/:params', array(
                'namespace' => $module['webControllerNamespace'],
                'module' => $moduleName,
                'controller' => isset($module['defaultController']) ? $module['defaultController'] : 'index',
                'action' => isset($module['defaultAction']) ? $module['defaultAction'] : 'index',
                'params' => 1
            ));

            $router->add('/' . $moduleName . '/:controller/:params', array(
                'namespace' => $module['webControllerNamespace'],
                'module' => $moduleName,
                'controller' => 1,
                'action' => isset($module['defaultAction']) ? $module['defaultAction'] : 'index',
                'params' => 2
            ));

            $router->add('/' . $moduleName . '/:controller/:action/:params', array(
                'namespace' => $module['webControllerNamespace'],
                'module' => $moduleName,
                'controller' => 1,
                'action' => 2,
                'params' => 3
            ));

            /**
             * Default API Module routing
             */
            $router->add('/' . $moduleName . '/api/{version:^(\d+\.)?(\d+\.)?(\*|\d+)$}/:params', array(
                'namespace' => $module['apiControllerNamespace'] . "\\" . 1,
                'module' => $moduleName,
                'version' => 1,
                'controller' => isset($module['defaultController']) ? $module['defaultController'] : 'index',
                'action' => isset($module['defaultAction']) ? $module['defaultAction'] : 'index',
                'params' => 2
            ));

            $router->add('/' . $moduleName . '/api/{version:^(\d+\.)?(\d+\.)?(\*|\d+)$}/:controller/:params', array(
                'namespace' => $module['apiControllerNamespace'] . "\\" . 1,
                'module' => $moduleName,
                'version' => 1,
                'controller' => 2,
                'action' => isset($module['defaultAction']) ? $module['defaultAction'] : 'index',
                'params' => 3
            ));

            $router->add('/' . $moduleName . '/api/{version:^(\d+\.)?(\d+\.)?(\*|\d+)$}/:controller/:action/:params', array(
                'namespace' => $module['apiControllerNamespace'] . "\\" . 1,
                'module' => $moduleName,
                'version' => 1,
                'controller' => 2,
                'action' => 3,
                'params' => 4
            ));
        } else {

            $webModuleRouting = APP_PATH . '/modules/' . $moduleName . '/config/routes/web.php';

            if (file_exists($webModuleRouting) && is_file($webModuleRouting)) {
                include $webModuleRouting;
            }

            $apiModuleRouting = APP_PATH . '/modules/' . $moduleName . '/config/routes/api.php';

            if (file_exists($apiModuleRouting) && is_file($apiModuleRouting)) {
                include $apiModuleRouting;
            }
        }
    }

    $router->removeExtraSlashes(true);

    return $router;
};
