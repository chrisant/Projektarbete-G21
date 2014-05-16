<?php namespace G21\App\Controllers;

use G21\Libraries\Controller;

class UserController extends Controller {

    public function login()
    {
        return $this->view->make('user.login');
    }



}