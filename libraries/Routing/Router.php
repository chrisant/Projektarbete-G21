<?php namespace G21\Libraries\Routing;

use G21\Libaries\Routing\RouteCollection;

class Router {

    /**
     * Alla våra rutter
     * @var \G21\Libraries\Route
     */
    protected $routes;

    /**
     * Den aktiva rutten
     * @var \G21\Libraries\Route
     */
    protected $current;

    /**
     * Skapa en instans av vår Router
     */
    public function __construct()
    {
        $this->routes = new RouteCollection;
    }


    /**
     * Registrera en GET-route med Routern
     *
     * @param string $uri
     * @param array $action
     * @return Route
     */
    public function get($uri, $action)
    {
        return $this->addRoute('GET', $uri, $action);
    }

    /**
     * Registrera en POST-route med Routern
     *
     * @param string $uri
     * @param array $action
     * @return Route
     */
    public function post($uri, $action)
    {
        return $this->addRoute('POST', $uri, $action);
    }

    /**
     * Registrera en PUT-route med Routern
     *
     * @param string $uri
     * @param array $action
     * @return Route
     */
    public function put($uri, $action)
    {
        return $this->addRoute('PUT', $uri, $action);
    }

    /**
     * Registrera en PATCH-route med Routern
     *
     * @param string $uri
     * @param array $action
     * @return Route
     */
    public function patch($uri, $action)
    {
        return $this->addRoute('PATCH', $uri, $action);
    }

    /**
     * Registrera en DELETE-route med Routern
     *
     * @param string $uri
     * @param array $action
     * @return Route
     */
    public function delete($uri, $action)
    {
        return $this->addRoute('DELETE', $uri, $action);
    }


    /**
     * Instansiera och lägg till en route i RouteCollection
     *
     * @param $method
     * @param string $uri
     * @param array $action
     * @return \G21\Libraries\Routing\Route
     */
    protected function addRoute($method, $uri, $action)
    {
        $route = new Route($method, $uri, $action);
        return $this->routes->add($route);
    }


}