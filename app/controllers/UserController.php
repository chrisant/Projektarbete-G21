<?php namespace G21\Controllers;

require APP_PATH . '/models/User.php';

use G21\Libraries\Validator;
use G21\Models\User;
use G21\Libraries\Config;
use G21\Libraries\Controller;

class UserController extends Controller {

    public function index()
    {
        $user = new User();
        $user = $user->findById($_SESSION['id']);
        $this->view->user = $user;
        return $this->view->render('user.profile');
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
        $input = [
            'name' => str_replace(' ', '', $_POST['name']),
            'email' => str_replace(' ', '', $_POST['email']),
            'phone' => str_replace('-', '', str_replace(' ', '', $_POST['phone'])),
            'password' => $_POST['password'],
            'confirm-password' => $_POST['confirm-password'],
        ];

        // Instansiera en ny användare
        $user = new User();

        // Instansiera en validator
        $validator = new Validator($user->rules);

        // Validera input och spara eventuella errormeddelanden
        $errors = $validator->validate($input);

        if ( $validator->result )
        {
            // Skapa salt och ett hashat lösenord
            $salt = str_shuffle(Config::SaltString);
            $hashedPass = hash('sha512', $_POST['password'] . $salt);

            // Ange värden för användaren
            $user->create([
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'password' => $hashedPass,
                'salt' => $salt
            ]);

            // Försök spara användaren (validering sker automatiskt i modellen)
            if ($user->save())
            {
                // redirecta till användarprofilen eller login?
                // logga in automatiskt?
                // verifiera epost senare eller innan login?
                header('Location: ' . PUBLIC_PATH . '/login');
            }

        }
        else
        {
            return $this->register($errors, $input);
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