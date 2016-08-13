<?php
namespace AXM\Mvc;

use Phalcon\Mvc\Router as PhalconRouter;

/**
 * Class extending \Phalcon\Mvc\Router that adds StaticController awareness
 *
 */
class Router extends PhalconRouter
{
    /**
     * Name of the controller that handles static content
     */
    const DEFAULT_STATIC_CONTROLLER = 'StaticPages';

    /**
     * Name of the action that handles static content
     */
    const DEFAULT_STATIC_ACTION = 'index';

    /**
     * 
     * @param string $path
     * @param string $name
     */
    public function addStatic($path, $name)
    {
        $this->add($path, [
            'controller' => self::DEFAULT_STATIC_CONTROLLER,
            'action' => self::DEFAULT_STATIC_ACTION,
            3 => $name
        ]);
    }
}