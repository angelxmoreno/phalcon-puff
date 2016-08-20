<?php

/**
 * Services are globally registered in this file
 *
 * @var Phalcon\Config $config
 */
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Files as MetaDataAdapter;
use Phalcon\Flash\Direct as Flash;
use Phalcon\Logger\Multiple as MultiLogger;
use AXM\Error\Handler as ErrorHandler;

/**
 * The FactoryDefault Dependency Injector automatically registers the right services to provide a full stack framework
 */
$di = new FactoryDefault();
$di['config'] = $config;

// Register the default dispatcher's namespace for controllers
$di->set('dispatcher', function () {
    $dispatcher = new Dispatcher();
    $dispatcher->setDefaultNamespace('AXM\Controllers');
    return $dispatcher;
});

/**
 * add routing capabilities
 */
$di->set('router', function() {
    $router = new AXM\Mvc\Router();
    require_once CONFIG_PATH . 'routes.php';
    return $router;
});

/**
 * Setting up the view component
 */
$di->set('view', function () use ($config) {
    $view = new View();
    $view->setViewsDir($config->application->viewsDir);
    $view->registerEngines([
        '.volt' => function ($view, $di) use ($config) {
            $volt = new VoltEngine($view, $di);
            $volt->setOptions($config->view->options->toArray());
            return $volt;
        },
        '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
    ]);
    return $view;
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->setShared('db', function () use ($config) {
    $dbConfig = $config->database->toArray();
    $adapter = $dbConfig['adapter'];
    unset($dbConfig['adapter']);
    $pdo_class = 'Phalcon\Db\Adapter\Pdo\\' . $adapter;
    return new $pdo_class($dbConfig);
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->setShared('modelsMetadata', function () {
    //@TODO use redis or something else
    return new MetaDataAdapter([
        'metaDataDir' => CACHE_PATH . 'metaDataDir' . DS
    ]);
});

/**
 * Register the session flash service with the Twitter Bootstrap classes
 */
$di->set('flash', function () {
    return new Flash([
        'error' => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice' => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ]);
});

/**
 * Start the session the first time some component request the session service
 */
$di->setShared('session', function () use($config) {
    $session_config = $config->sessions->toArray();
    $adapter = $session_config['adapter'];
    unset($session_config['adapter']);
    $adapter_class = 'Phalcon\Session\Adapter\\' . $adapter;
    $session = new $adapter_class($session_config);
    $session->start();
    return $session;
});

/**
 * Register logging
 */
$di->setShared('logger', function () use ($config) {
    $logger = new MultiLogger();
    $adapters = $config->logger->adapters->toArray();
    foreach ($adapters as $adapter => $options) {
        $adapter_class = 'Phalcon\Logger\Adapter\\' . $adapter;
        $logger->push(new $adapter_class($options));
    }
    return $logger;
});

//Register Cache Engines
if ($config->cache) {
    foreach ($config->cache as $engine => $adapters) {
        $di->setShared($engine . 'cache', function()use($adapters) {
            $frontend_class = 'Phalcon\Cache\Frontend\\' . key($adapters->frontend);
            $frontend_instance = new $frontend_class(current($adapters->frontend->toArray()));

            $backend_class = 'Phalcon\Cache\Backend\\' . key($adapters->backend);
            $cache = new $backend_class($frontend_instance, current($adapters->backend->toArray()));
            echo $backend_class;
            return $cache;
        });
    }
}

/**
 * Register Error Handler
 */
ErrorHandler::register(
    $di->getShared('dispatcher'), $di->getShared('view'), $di->getShared('response')
);
