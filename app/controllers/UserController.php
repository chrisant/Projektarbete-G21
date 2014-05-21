<?php namespace G21\Controllers;

require APP_PATH . '/models/User.php';

use G21\Models\User;
use G21\Libraries\Config;
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

        // Spara och formattera POST-datan
        $name = str_replace(' ', '', $_POST['name']);
        $email = str_replace(' ', '', $_POST['email']);
        $phone = str_replace('-', '', str_replace(' ', '', $_POST['phone']));

        // Skapa salt och ett hashat lösenord
        $salt = md5(str_shuffle(Config::SaltString));
        $hashedPass = hash('sha512', $_POST['password'] . $salt);
        $hashedConfirm = hash('sha512', $_POST['confirm-password'] . $salt);

        // Instansiera en ny användare
        $user = new User();

        // Ange värden för användaren
        $user->create([
            'name' => $name,
            'email' => $email,
            'password' => $hashedPass,
            'confirm-password' => $hashedConfirm,
            'phone' => $phone,
            'salt' => $salt
        ]);

        // Försök spara användaren (validering sker automatiskt i modellen)
        if ($user->save()) {
            echo 'Successfully saved user';
        }
        else
        {
            return $this->register($user->validationErrors, $_POST);
        }
    }


    public function profile($id)
    {
        $user = new User();
        $user = $user->findById($id);
        $this->view->user = $user;
        return $this->view->render('user.profile');
    }


    public function all()
    {
        $users = new User();
        $users = $users->all();
        $this->view->users = $users;
        return $this->view->render('user.all');
    }


}