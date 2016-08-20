<?php
/**
 * Load Composer's autoloading
 */
require_once VENDOR_PATH . 'autoload.php';

/**
 * Load env variables
 */
$dotenv = new Dotenv\Dotenv(ROOT_PATH);
$dotenv->load();
