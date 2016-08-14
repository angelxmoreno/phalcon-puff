<?php

namespace AXM\Error;

use Phalcon\Di;

/**
 * Helper class for the Error Module
 */
class Common
{
    const PRODUCTION = 'production';
    const STAGING = 'staging';
    const TEST = 'test';
    const DEVELOPMENT = 'development';

    /**
     * The current env type
     * @var string
     */
    protected static $env;

    /**
     * The current env type
     * @var Phalcon\Logger
     */
    protected static $logger;

    /**
     * Sets the env to production
     */
    public static function setProduction()
    {
        self::$env = self::PRODUCTION;
    }

    /**
     * sets the env to staging
     */
    public static function setStaging()
    {
        self::$env = self::STAGING;
    }

    /**
     * sets the env to testing
     */
    public static function setTest()
    {
        self::$env = self::TEST;
    }

    /**
     * sets the env to development
     */
    public static function setDevelopment()
    {
        self::$env = self::DEVELOPMENT;
    }

    /**
     * Gets the current env string
     *
     * @return string
     */
    public static function getEnv()
    {
        return self::$env;
    }

    /**
     * Returns the logger or created one if not found
     *
     * @return Phalcon\Logger
     */
    public static function getLogger()
    {
        if (self::$logger) {
            return self::$logger;
        }

        /**
         * @var \Phalcon\Di $di
         */
        $di = Di::getDefault();
        $logger = $di->has('logger') ? $di->get('logger') : new \Phalcon\Logger\Adapter\Syslog(null);

        self::$logger = $logger;
        return $logger;
    }
}
