<?php
namespace AXM\Controllers;

$router->removeExtraSlashes(true);
$router->addStatic('/', 'home');
$router->addStatic('about');
$router->addStatic('contact');
