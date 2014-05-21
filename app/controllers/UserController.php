<?php namespace G21\App\Controllers;

use G21\Libraries\Controller;

class UserController extends Controller {

    public function index()
    {
        // get current user, save it to view

        return $this->view->render('user.show');
    }

    public function login()
    {
        return $this->view->render('user.login');
    }

    public function logout()
    {
        // terminate session pls
    }

    public function register($errors = array(), $old = array())
    {
        // Spara errormeddelanden till vyn om de angetts.
        $this->view->errors = $errors;
        $this->view->old = $old;

        // Rendera vyn
        return $this->view->render('user.register');
    }

    public function store()
    {
        // Om ingen POST-data finns omdirigerar vi till user/create
        if (empty($_POST)) header('Location: ' . PUBLIC_PATH . '/user/register');

        // Spara POST-datan
        $input = [
            'username'          => str_replace(' ', '', $_POST['username']),
            'email'             => str_replace(' ', '', $_POST['email']),
            'password'          => $_POST['password'],
            'confirm-password'  => $_POST['confirm-password']
        ];

        // Utför validering och spara eventuella errormeddelanden
        //$errors = $this->validator->validate($input);
        $validator = $this->getValidator('User');
        $errors = $validator->validate($input);


        // om valideringen lyckas
        if ($validator->result)
        {
            //$user = new User();

            $hashedPass = hash('sha512', $input['password'] . Config::Salt);

            $user = new User();

        }
        else
        {
            return $this->register($errors, $input);
        }
    }


}