<?php
use Phalcon\Loader as PhalconLoader;

require_once VENDOR_PATH . 'autoload.php';
$loader = new PhalconLoader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs([
    $config->application->controllersDir,
    $config->application->modelsDir
])->register();
