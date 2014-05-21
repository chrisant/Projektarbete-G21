<?php namespace G21\Libraries;


class Controller {

    public $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function getValidator($class)
    {
        // Om inget namn anges returnerar vi null
        if (!$class) return null;

        // Inkludera modell och validator som barnklassen använder
        require SITE_PATH . '/app/models/' . $class . '.php';
        require SITE_PATH . '/libraries/Validation/' . $class . 'Validator.php';

        // skapa strängen för klassnamnet
        $class = '\Staf\Libraries\Validation\\' . $class . 'Validator';

        // instansiera et valideringsobjekt
        return $this->validator = new $class();
    }
}