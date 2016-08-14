<?php
namespace AXM\Error;

use Phalcon\Error\Error as BaseError;
use Phalcon\Logger;

/**
 * Error Class
 */
class Error extends BaseError
{
    /**
     * Creates a 404 error object
     * @return Error
     */
    public static function create404Error()
    {
        $options = [
            'type' => 404,
            'message' => 'Page not found',
            'isException' => false,
            'isError' => true,
        ];
        return new Error($options);
    }

    /**
     * Created an error object from an exception
     * 
     * @param \Exception $e
     * @return \AXM\Error\Error
     */
    public static function createExceptionError(\Exception $e)
    {
        $options = [
            'type' => $e->getCode(),
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'isException' => true,
            'exception' => $e,
        ];
        return new Error($options);
    }

    /**
     * Returns the string version of the error type
     * 
     * @return string
     * @TODO if we move this to the instantiation, then we only need to go through this once
     */
    public function errorCodeString()
    {
        switch ($this->type()) {
            case 0:
                return 'Uncaught exception';
            case E_ERROR: // 1 // 
                return 'E_ERROR';
            case E_WARNING: // 2 // 
                return 'E_WARNING';
            case E_PARSE: // 4 // 
                return 'E_PARSE';
            case E_NOTICE: // 8 // 
                return 'E_NOTICE';
            case E_CORE_ERROR: // 16 // 
                return 'E_CORE_ERROR';
            case E_CORE_WARNING: // 32 // 
                return 'E_CORE_WARNING';
            case E_COMPILE_ERROR: // 64 // 
                return 'E_COMPILE_ERROR';
            case E_COMPILE_WARNING: // 128 // 
                return 'E_COMPILE_WARNING';
            case E_USER_ERROR: // 256 // 
                return 'E_USER_ERROR';
            case E_USER_WARNING: // 512 // 
                return 'E_USER_WARNING';
            case E_USER_NOTICE: // 1024 // 
                return 'E_USER_NOTICE';
            case E_STRICT: // 2048 // 
                return 'E_STRICT';
            case E_RECOVERABLE_ERROR: // 4096 // 
                return 'E_RECOVERABLE_ERROR';
            case E_DEPRECATED: // 8192 // 
                return 'E_DEPRECATED';
            case E_USER_DEPRECATED: // 16384 // 
                return 'E_USER_DEPRECATED';
            default:
                return (string) $this->type();
        }
    }

    /**
     * Returns the log level based on error type
     * 
     * @return string
     * @TODO if we move this to the instantiation, then we only need to go through this once
     */
    public function logType()
    {
        switch ($this->type()) {
            case E_WARNING:
            case E_USER_WARNING:
            case E_CORE_WARNING:
            case E_COMPILE_WARNING:
                return Logger::WARNING;
            case E_NOTICE:
            case E_USER_NOTICE:
                return Logger::NOTICE;
            case E_STRICT:
            case E_DEPRECATED:
            case E_USER_DEPRECATED:
                return Logger::INFO;
            default:
                return Logger::ERROR;
        }
    }

    /**
     * Determines if the error should trigger a redirect
     * 
     * @return boolean
     * @TODO if we move this to the instantiation, then we only need to go through this once
     */
    public function shouldRedirect()
    {
        switch ($this->type()) {
            case 0:
            case 404:
            case E_WARNING;
            case E_ERROR:
            case E_PARSE:
            case E_CORE_ERROR:
            case E_COMPILE_ERROR:
            case E_USER_ERROR:
            case E_RECOVERABLE_ERROR:
                return true;
            default:
                return false;
        }
    }
    
    /**
     * Returns the log-friendly string version of the error
     * 
     * @return string
     * @TODO if we move this to the instantiation, then we only need to go through this once
     */
    public function logMessage()
    {
        return "{$this->errorCodeString()}: {$this->message()} in {$this->file()} on line {$this->line()}";
    }
}
