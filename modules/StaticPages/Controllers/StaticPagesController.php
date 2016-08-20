<?php
namespace AXM\StaticPages\Controllers;
use Phalcon\Mvc\Controller;
class StaticPagesController extends Controller
{
    public function IndexAction($page)
    {
        $inferred_view = $this->getInferredView($page);
        $inferred_path = $this->getInferredPath($page);
        if (file_exists($inferred_path)) {
            $this->view->pick($inferred_view);
        } else {
            echo $inferred_view;
            die;
        }
    }
    
    public function wtfAction()
    {
        echo 'wtf';
    }

    protected function getInferredView($page)
    {
        return 'static-pages' . DS . $page;
    }

    protected function getInferredPath($page)
    {
        return VIEWS_PATH . 'static-pages' . DS . $page . '.volt';
    }
}