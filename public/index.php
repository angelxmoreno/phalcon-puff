<?php
use Phalcon\Mvc\Application as PhalconMvcApplication;
use Phalcon\Config as PhalconConfig;

error_reporting(E_ALL);
define('DS', DIRECTORY_SEPARATOR);
define('WEBROOT_PATH', __DIR__ . DS);
define('ROOT_PATH', dirname(WEBROOT_PATH) . DS);
define('APP_PATH', ROOT_PATH . 'src' . DS);
define('CONFIG_PATH', ROOT_PATH . 'config' . DS);
define('CACHE_PATH', ROOT_PATH . 'cache' . DS);
define('VIEWS_PATH', ROOT_PATH . 'views' . DS);
define('VENDOR_PATH', ROOT_PATH . 'vendor' . DS);

try {
    /**
     * Set the default timezone
     * This should always be UTC
     */
    date_default_timezone_set('UTC');
    
    /**
     * Read the configuration
     */
    $config_array = require_once CONFIG_PATH . 'config.php';
    $config = new PhalconConfig($config_array);

    /**
     * Read auto-loader
     */
    require_once CONFIG_PATH . 'loader.php';

    /**
     * Read services
     */
    require_once CONFIG_PATH . 'services.php';

    /**
     * Handle the request
     */
    $application = new PhalconMvcApplication($di);

    echo $application->handle()->getContent();
} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
