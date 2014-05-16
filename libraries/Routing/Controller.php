<?php namespace G21\Libraries;


class Controller {

    public $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function requireModel($modelName)
    {
        $path = APP . 'models/' . ucfirst($modelName) . '.php';
        $modelName = '\G21\App\Models\\' . ucfirst($modelName);

        if ( file_exists($path) )
        {
            require $path;
            return $model = new $modelName();
        }
    }
}