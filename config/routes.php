<?php
$router->removeExtraSlashes(true);
//@TODO move to Error Handler register
$router->notFound([
    'controller' => 'error',
    'action' => 'error404'
]);
$router->addStatic('/', 'home');
$router->addStatic('about');
$router->addStatic('contact');
$router->addStatic('services');
