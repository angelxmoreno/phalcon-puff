<?php
namespace AXM\Controllers;

$router->removeExtraSlashes(true);
$router->addStatic('/about', 'about');
$router->addStatic('/contact', 'contact');
