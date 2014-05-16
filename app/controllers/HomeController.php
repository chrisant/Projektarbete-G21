<?php namespace G21\App\Controllers;

use G21\Libraries\Controller;

class HomeController extends Controller {

    public function home()
    {
        //$this->view->useModel(['hello' => 'world']);
        $this->requireModel('dummy');
        return $this->view->make('layout.home');
    }

}