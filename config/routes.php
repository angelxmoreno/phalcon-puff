<?php
$router->removeExtraSlashes(true);
$router->addStatic('/about', 'about');
$router->addStatic('/contact', 'contact');
//@TODO move to Error Handler register
$router->notFound([
    'controller' => 'error',
    'action' => 'error404'
]);
