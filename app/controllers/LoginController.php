<?php namespace G21\Controllers;

require APP_PATH . '/models/User.php';

use G21\Libraries\Controller;
use G21\Models\User;

class LoginController extends Controller {

    public function index()
    {
        return $this->view->render('user.login');
    }

    public function post()
    {

        // Om ingen POST-data finns omdirigerar vi till /login
        if (!empty($_POST))
        {
            $user = new User();
            $user = $user->find('email', $_POST['email']);

            $dbPass = $user[0]->password;
            $salt = $user[0]->salt;

            $pass = hash('sha512', $_POST['password'] . $salt);

            if ($pass === $dbPass)
            {
                $_SESSION['id'] = $user[0]->id;
                header('Location: ' . PUBLIC_PATH . '/user/profile/' . $user[0]->id);
            }
        }
        header('Location: ' . PUBLIC_PATH . '/login');
    }

    public function doLogin()
    {

    }

    public function terminate()
    {
        session_destroy();
        header('Location: ' . PUBLIC_PATH);
    }

}