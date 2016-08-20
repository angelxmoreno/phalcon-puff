<?php
define('DS', DIRECTORY_SEPARATOR);
define('WEBROOT_PATH', __DIR__ . DS);
define('ROOT_PATH', dirname(WEBROOT_PATH) . DS);
define('APP_PATH', ROOT_PATH . 'src' . DS);
define('CONFIG_PATH', ROOT_PATH . 'config' . DS);
define('CACHE_PATH', ROOT_PATH . 'cache' . DS);
define('VIEWS_PATH', ROOT_PATH . 'views' . DS);
define('VENDOR_PATH', ROOT_PATH . 'vendor' . DS);
define('LOGS_PATH', ROOT_PATH . 'logs' . DS);

use Phalcon\Mvc\Application;
use Phalcon\Config as PhalconConfig;

//@TODO this should be handled by the Error Module
error_reporting(E_ALL);
/**
 * Set the default timezone
 * This should always be UTC
 */
date_default_timezone_set('UTC');

/**
 * Read the configuration
 */
$config = require CONFIG_PATH . 'config.php';

/**
 * Read auto-loader
 */
require_once CONFIG_PATH . 'loader.php';

/**
 * Set the Application's ENV
 */
//@TODO make use of the config
//@TODO consider moving to services
\AXM\Error\Common::setDevelopment();

/**
 * Register services
 */
require_once CONFIG_PATH . 'services.php';

/**
 * Handle the request
 */
$application = new Application($di);
echo $application->handle()->getContent();
