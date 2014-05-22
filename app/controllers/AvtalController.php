<?php namespace G21\Controllers;

use G21\Libraries\Controller;

class AvtalController extends Controller {

    public function index()
    {
        return $this->view->render('info.avtal');
    }
}