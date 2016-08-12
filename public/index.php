<?php
use Phalcon\Mvc\Application as PhalconApplication;
use Phalcon\Config as PhalconConfig;

error_reporting(E_ALL);
define('DS', DIRECTORY_SEPARATOR);
define('WEBROOT_PATH', __DIR__ . DS);
define('ROOT_PATH', dirname(WEBROOT_PATH) . DS);
define('APP_PATH', ROOT_PATH . 'app' . DS);
define('CONFIG_PATH', APP_PATH . 'config' . DS);

try {
    /**
     * Read the configuration
     */
    $config_array = include CONFIG_PATH . 'config.php';
    $config = new PhalconConfig($config_array);

    /**
     * Read auto-loader
     */
    include CONFIG_PATH . 'loader.php';

    /**
     * Read services
     */
    include CONFIG_PATH . 'services.php';

    /**
     * Handle the request
     */
    $application = new PhalconApplication($di);

    echo $application->handle()->getContent();

} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
