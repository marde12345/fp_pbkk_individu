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
            'module' => 'dashboard',
            'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
            'controller' => 'showerror',
            'action'     => 'show404',
        ]
    );

    /**
     * Manual Routing
     */
    $router->add('/login', array(
        'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'module' => 'dashboard',
        'controller' => 'dashboard',
        'action' => 'login'
    ));

    $router->addPost('/login', array(
        'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'module' => 'dashboard',
        'controller' => 'login',
        'action' => 'login'
    ));

    $router->add('/register', array(
        'namespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'module' => 'dashboard',
        'controller' => 'dashboard',
        'action' => 'register'
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
