<?php
use Phalcon\Loader as PhalconLoader;

require_once VENDOR_PATH . 'autoload.php';
$loader = new PhalconLoader();
$loader->registerNamespaces([
    'AXM\Controllers' => APP_PATH . 'Controllers' . DS,
    'AXM\Models' => APP_PATH . 'Models' . DS
])->register();
