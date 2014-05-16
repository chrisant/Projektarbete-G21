<?php namespace G21\Libraries\Framework;

class Application {

    public function __construct()
    {
        // Mycket enkel routing att använda för tillfället.
        // Adressen blir då example.com/controller/action/parameters
        $uri = isset($_SERVER['PATH_INFO']) ? explode('/', $_SERVER['PATH_INFO']) : null;

        // Kontrollera först om vi laddar startsidan. Dvs om uri är tom.
        if ( empty($uri) )
        {
            $homecontroller = APP . 'controllers/HomeController.php';
            require $homecontroller;
            $controller = new \G21\App\Controllers\HomeController();
            $controller->home();
        }
        else
        {
            // Spara uri-segmenten i egna variabler.
            $class = isset($uri[1]) ? '\G21\App\Controllers\\' . ucfirst($uri[1]) . 'Controller': null;
            $filepath = isset($uri[1]) ? APP . 'controllers/' . ucfirst($uri[1]) . 'Controller.php' : null;
            $action = isset($uri[2]) ? $uri[2] : null;
            $param = isset($uri[3]) ? $uri[3] : null;

            // Ladda rätt kontroller, om den finns.
            if (file_exists($filepath))
                require $filepath;
            else
                throw new \G21\Libraries\Exceptions\NotFoundException("The file: $filepath Does not exist");


            $controller = new $class;

            if ( isset($action) )
            {
                if ( isset($param) )
                    $controller->{$action}($param);
                else
                    $controller->{$action}();
            }
        }

    }

}