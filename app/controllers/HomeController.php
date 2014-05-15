<?php namespace G21\App\Controllers;

use G21\Libraries\Controller;
use G21\Libraries\View;

class HomeController extends Controller {

    public function home()
    {
        return View::make('layout.home');
    }

}