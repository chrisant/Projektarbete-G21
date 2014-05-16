<?php namespace G21\Libraries;


class Controller {

    public $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function requireModel($modelName)
    {
        $modelName = ucfirst($modelName);
        $path = APP . 'models/' . $modelName . '.php';

        if ( file_exists($path) )
        {
            require $path;
            $model = new $modelName();

        }
    }

}