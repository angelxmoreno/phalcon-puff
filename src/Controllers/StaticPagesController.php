<?php
namespace AXM\Controllers;

class StaticPagesController extends BaseController
{

    public function IndexAction($page)
    {
//        $this->view->pick('static-pages/about');
        $inferred_view = $this->getInferredView($page);
        $inferred_path = $this->getInferredPath($page);
        if (file_exists($inferred_path)) {
            $this->view->pick($inferred_view);
        } else {
            echo $inferred_view;
            die;
        }
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