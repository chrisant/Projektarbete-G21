<?php namespace G21\App\Controllers;

use G21\Libraries\Controller;
use G21\Libraries\View;

class UserController extends Controller {

    public function login()
    {
        View::make('user.login');
    }



}