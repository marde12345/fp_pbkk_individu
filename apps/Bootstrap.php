<?php

use Exception as E;
use Phalcon\Debug;
use Phalcon\Dispatcher;
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Application;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;
use Phalcon\Mvc\Dispatcher\Exception as DispatchException;
use Phalcon\Events\Event;
use Phalcon\Events\Manager as EventsManager;


class Bootstrap extends Application
{
    private $modules;
    private $defaultModule;

    public function __construct($defaultModule)
    {
        $this->modules = require APP_PATH . '/config/modules.php';
        $this->defaultModule = $defaultModule;
    }

    public function init()
    {
        $this->_registerServices();

        $config = $this->getDI()['config'];

        if ($config->mode == 'DEVELOPMENT') {
            $debug = new Debug();
            $debug->listen();
        }

        /**
         * Load modules
         */
        $this->registerModules($this->modules);

        echo $this->handle()->getContent();
    }

    private function _registerServices()
    {
        $defaultModule = $this->defaultModule;

        if (getenv('APPLICATION_ENV') !== 'production') {
            $envFile = ((getenv('APPLICATION_ENV') === 'testing') ? '.env.test' : '.env');
            $dotEnv = Dotenv\Dotenv::create(APP_PATH, $envFile);
            $dotEnv->load();
        }
        $env = getenv('APPLICATION_ENV');

        //setup config
        if (!$env) {
            echo "Application environment not set";
            exit;
        } else {
            $config = require APP_PATH . '/config/config.php';
        }

        $di = new FactoryDefault();
        $config = require APP_PATH . '/config/config.php';
        $modules = $this->modules;

        include_once APP_PATH . '/config/loader.php';
        include_once APP_PATH . '/config/services.php';
        include_once APP_PATH . '/config/routing.php';

        // Route 404
        $di->setShared(
            'dispatcher',
            function () {
                // Create an EventsManager
                $eventsManager = new EventsManager();

                // Attach a listener
                $eventsManager->attach(
                    'dispatch:beforeException',
                    function (Event $event, $dispatcher, Exception $exception) {
                        // Handle 404 exceptions
                        if ($exception instanceof DispatchException) {
                            $dispatcher->forward(
                                [
                                    'module'        => 'dashboard',
                                    'controller'    => 'showerror',
                                    'action'        => 'show404',
                                ]
                            );

                            return false;
                        }

                        // Alternative way, controller or action doesn't exist
                        switch ($exception->getCode()) {
                            case Dispatcher::EXCEPTION_HANDLER_NOT_FOUND:
                            case Dispatcher::EXCEPTION_ACTION_NOT_FOUND:
                                $dispatcher->forward(
                                    [
                                        'module'        => 'dashboard',
                                        'controller'    => 'showerror',
                                        'action'        => 'show404',
                                    ]
                                );

                                return false;
                        }
                    }
                );

                $dispatcher = new MvcDispatcher();

                // Bind the EventsManager to the dispatcher
                $dispatcher->setEventsManager($eventsManager);

                return $dispatcher;
            }
        );

        $this->setDI($di);
    }
}
