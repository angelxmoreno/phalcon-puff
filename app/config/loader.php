<?php
use Phalcon\Loader as PhalconLoader;

$loader = new PhalconLoader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs([
    $config->application->controllersDir,
    $config->application->modelsDir
])->register();
