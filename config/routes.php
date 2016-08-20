<?php
//$router->removeExtraSlashes(true);
$router->setDefaultModule('app');

//@TODO move to Error Handler register
$router->notFound([
    'controller' => 'error',
    'action' => 'error404'
]);
$router->add('/', [
    'module' => 'statics',
    'controller' => 'static-pages',
    'action' => 'index',
    3 => 'home'
]);

//$router->addStatic('/', 'home');
$router->addStatic('about');
$router->addStatic('contact');
$router->addStatic('services');
