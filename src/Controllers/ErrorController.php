<?php
namespace AXM\Controllers;

use AXM\Error\Common;
use AXM\Error\Error;

/**
 * Controller for showing errors
 */
class ErrorController extends BaseController
{

    /**
     * Renders generic errors
     */
    public function indexAction()
    {
        $error = $this->getError();
        $this->showError($error);
    }
    
    /**
     * Renders 404 errors
     */
    public function error404Action()
    {
        $error = Error::create404Error();
        $this->showError($error);
    }
    
    /**
     * Helper method for rending errors
     * 
     * @param Error $error
     */
    protected function showError($error){
        $status_code = $this->getStatusCode($error);
        $this->response
            ->resetHeaders()
            ->setStatusCode($status_code, null);
        
        $this->view->setVars([
            'error' => $error,
            'status_code' => $status_code,
            'env' => Common::getEnv(),
            'is_dev' => (Common::getEnv() != Common::PRODUCTION)
        ]);
        $this->view->pick('error/error');
    }

    /**
     * Helper method for getting the error from the Dispatcher
     * 
     * @return Error
     */
    protected function getError()
    {
        return ($this->dispatcher->getParam('error'))
            ? : new Error();
    }
    
    /**
     * Helper method for mapping error codes to status types
     * 
     * @param Error $error
     * @return int
     * 
     * @TODO the Erro object should know how to set this
     */
    protected function getStatusCode($error)
    {
        $code = $error->type();
        switch ($code) {
            case 404:
            case 403:
            case 401:
                return $code;
            default:
                return 500;
        }
    }
}
