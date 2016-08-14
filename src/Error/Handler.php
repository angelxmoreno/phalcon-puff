<?php

namespace AXM\Error;

use Phalcon\Mvc\Dispatcher\Exception as DispatchException;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\View;
use Phalcon\Http\Response;

class Handler
{
    protected static $controller_name = 'error';
    protected static $action_name = 'index';
    protected static $dispatcher;
    protected static $view;
    protected static $response;

    /**
     * Registers itself as an error interceptor
     *
     * @param Dispatcher $dispatcher
     * @param View $view
     * @param Response $response
     */
    public static function register(Dispatcher $dispatcher, View $view, Response $response)
    {
        self::$dispatcher = $dispatcher;
        self::$view = $view;
        self::$response = $response;

        self::applyErrorReporting();
        self::registerErrorHandler();
        self::registerExceptionHandler();
        self::registerShutdownFunction();
    }

    /**
     * Logs the error and overrides the dispatcher if needed
     *
     * @param Error $error
     */
    public static function handle(Error $error)
    {
        Common::getLogger()->log($error->logType(), $error->logMessage());
        if ($error->shouldRedirect()) {
            self::dispatchError($error);
        } else {
            echo $error->type();
        }
    }

    /**
     * Applies the error reporting level for the correct app env
     */
    protected static function applyErrorReporting()
    {
        switch (Common::getEnv()) {
            case Common::PRODUCTION:
            case Common::STAGING:
            default:
                $display_errors = 0;
                $error_reporting = 0;
                break;
            case Common::TEST:
            case Common::DEVELOPMENT:
                $display_errors = 1;
                $error_reporting = -1;
                break;
        }

        ini_set('display_errors', $display_errors);
        error_reporting($error_reporting);
    }

    /**
     * Registers itself as the error handler
     */
    protected static function registerErrorHandler()
    {
        set_error_handler(function ($errno, $errstr, $errfile, $errline) {
            if (!($errno & error_reporting())) {
                return;
            }
            $options = [
                'type' => $errno,
                'message' => $errstr,
                'file' => $errfile,
                'line' => $errline,
                'isError' => true,
            ];
            static::handle(new Error($options));
        });
    }

    /**
     * Registers itself as an exception handler
     */
    protected static function registerExceptionHandler()
    {
        set_exception_handler(function (\Exception $e) {
            if (self::is404Exception($e)) {
                $error = Error::create404Error();
            } else {
                $error = Error::createExceptionError($e);
            }
            self::handle($error);
        });
    }
    
    /**
     * Registers itself as a shutdown function
     */
    protected static function registerShutdownFunction()
    {
        register_shutdown_function(function () {
            if (!is_null($options = error_get_last())) {
                static::handle(new Error($options));
            }
        });
    }
    
    /**
     * Determins if the exception given should be treated as a 404 error
     * 
     * @param \Exception $e
     * @return boolean
     */
    protected static function is404Exception(\Exception $e)
    {
        return ($e instanceof DispatchException && (
            $e->getCode() == Dispatcher::EXCEPTION_HANDLER_NOT_FOUND ||
            $e->getCode() == Dispatcher::EXCEPTION_ACTION_NOT_FOUND
        ));
    }

    /**
     * Uses the dispatcher, view and response to dispatch the view
     * 
     * @param \Error $error
     * @return mixed
     * 
     * @TODO is this the best way to perform this task?
     */
    protected static function dispatchError(Error $error)
    {
        $dispatcher = self::$dispatcher;
        $view = self::$view;
        $response = self::$response;

        $dispatcher->setControllerName(self::$controller_name);
        $dispatcher->setActionName(self::$action_name);
        $dispatcher->setParams(['error' => $error]);
        $view->start();
        $dispatcher->dispatch();
        $view->render(self::$controller_name, self::$action_name, $dispatcher->getParams());
        $view->finish();
        return $response->setContent($view->getContent())->send();
    }
}
