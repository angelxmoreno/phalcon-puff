<?php
namespace AXM\StaticPages\Mvc;

use Phalcon\Mvc\Router as PhalconRouter;

/**
 * Class extending \Phalcon\Mvc\Router that adds StaticPagesController awareness
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
    public function addStatic($path, $name = null)
    {
        if(is_null($name)){
            $name = str_replace('/', '', $path);
            $path = '/' . $name;
        }
        var_dump($path);
        var_dump($name);
        $this->add($path, [
            'namespace' => 'AXM\\Statics\\',
            'module' => 'statics',
            'controller' => self::DEFAULT_STATIC_CONTROLLER,
            'action' => self::DEFAULT_STATIC_ACTION,
            3 => $name
        ]);
    }
}