<?php namespace G21\Libaries\Routing;

use G21\Libraries\Routing\Route;

class RouteCollection {

    /**
     * En array med alla Routes per metod
     * @var array
     */
    protected $routes = array();

    /**
     * En "platt" array med alla Routes
     * @var array
     */
    protected $allRoutes = array();

    /**
     * En array med ala Routes per namn
     * @var array
     */
    protected $nameList = array();

    /**
     * En array med alla Routes per Controller
     * @var array
     */
    protected $controllerList = array();

    /**
     * Lägg till en Route i samlingen
     * @param Route $route
     * @return Route
     */
    public function add(Route $route)
    {
        $this->addToCollections($route);
        return $route;
    }

    /**
     * Lägg till Routen i arrayernap
     * @param $route
     */
    protected function addToCollections($route)
    {
        $this->routes[$route->$method][] = $route;
        $this->nameList[$route->getAction()] = $route;
        $this->controllerList[$route->getController()] = $route;
    }
}







