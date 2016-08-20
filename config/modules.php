<?php
// Register the installed modules
$application->registerModules([
    'app' => [
        'className' => 'AXM\Module',
        'path' => APP_PATH . 'Module.php',
    ],
    'statics' => [
        'className' => 'AXM\StaticPages\Module',
        'path' => MODULES_PATH . 'StaticPages' . DS . 'Module.php',
    ]
]);

//register default module paths
$router = $di->get('router');
var_dump($application->getModules());
//foreach ($application->getModules() as $key => $module) {
//    $namespace = str_replace('Module', 'Controllers', $module['className']);
//    $router->add('/' . $key . '/:params', array(
//        'namespace' => $namespace,
//        'module' => $key,
//        'controller' => 'index',
//        'action' => 'index',
//        'params' => 1
//    ))->setName($key);
//    $router->add('/' . $key . '/:controller/:params', array(
//        'namespace' => $namespace,
//        'module' => $key,
//        'controller' => 1,
//        'action' => 'index',
//        'params' => 2
//    ));
//    $router->add('/' . $key . '/:controller/:action/:params', array(
//        'namespace' => $namespace,
//        'module' => $key,
//        'controller' => 1,
//        'action' => 2,
//        'params' => 3
//    ));
//}
//
$di->set('router', $router);
