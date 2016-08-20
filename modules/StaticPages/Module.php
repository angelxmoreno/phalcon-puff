<?php

namespace AXM\StaticPages;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Config;

class Module implements ModuleDefinitionInterface
{
    /**
     * Registers an autoloader related to the module
     *
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces(array(
            'AXM\StaticPages\Controllers' => __DIR__ . '/Controllers/',
        ));

        $loader->register();
    }

    /**
     * Registers services related to the module
     *
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {
        /**
         * Read common configuration
         */
        $config = $di->has('config') ? $di->getShared('config') : null;

        /**
         * Try to load local configuration
         */
        if (file_exists(__DIR__ . '/config/config.php')) {
            $override = new Config(include __DIR__ . '/config/config.php');
            if ($config instanceof Config) {
                $config->merge($override);
            } else {
                $config = $override;
            }
        }
    }
}
