<?php namespace G21\Libraries\Framework;

class Application {

    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];



    /*
     * Vanligtvis använder man sig av mer avancerad "routing" för att hitta till
     * olika delar av sidan/applikationen,
     *
     */
    public function __construct()
    {
        $url = $this->parseUrl();
        $this->loadController($url);
    }

    private function parseUrl()
    {
        if (isset($_SERVER['PATH_INFO']))
        {
            return $url = explode('/',
                filter_var(
                    trim($_SERVER['PATH_INFO'], '/'),
                    FILTER_SANITIZE_URL
                )
            );
        }
        return false;
    }


    private function loadController($url)
    {
        $controllerFile = APP_PATH . '/controllers/' . ucfirst($url[0]) . 'Controller.php';

        if (file_exists($controllerFile))
        {
            $this->controller = '\G21\Controllers\\' . ucfirst($url[0]) . 'Controller';
            unset($url[0]);
        }
        else
        {
            if (isset($url[0]))
            {
                // episk felhantering #YOLO
                echo ('Controller \'<strong>' . ucfirst($url[0]) . 'Controller</strong>\' does not exist');
                die();
            }

            $controllerFile = APP_PATH . '/controllers/' . $this->controller . '.php';
            $this->controller = '\G21\Controllers\\' . $this->controller;
        }

        require_once $controllerFile;
        $this->controller = new $this->controller;

        if (isset($url[1]))
        {
            if (method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
            else
            {
                // episk felhantering #YOLO
                echo ('Controller method \'<strong>' . $url[1] . '</strong>\' does not exist');
                die();
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

}