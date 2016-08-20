<?php
$router->removeExtraSlashes(true);
$router->setDefaultModule('app');
$router->add('/login', [
    'module' => 'users',
    'controller' => 'auth',
    'action' => 'login'
]);


$router->add('/:module/:controller/:action/:params', [
    'module' => 1,
    'controller' => 2,
    'action' => 3,
    'params' => 4
]);
//@TODO move to Error Handler register
$router->notFound([
    'controller' => 'error',
    'action' => 'error404'
]);
$router->addStatic('/', 'home');
$router->addStatic('about');
$router->addStatic('contact');
$router->addStatic('services');
//
//$router->add('/users/', [
//    'module' => 'users',
//    'controller' => 'index',
//    'action' => 'index',
//]);
//
$router->add('/users/view', [
    'module' => 'users',
    'controller' => 'index',
    'action' => 'view',
]);



