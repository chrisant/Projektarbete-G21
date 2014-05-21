<?php namespace G21\Libraries\Routing;

use Closure;

// Det är den här klassen som instansieras som en rutt.
// En rutt/Route innehåller information om vilken metod (HTTP) som används
// samt om vilken kontroller som används för att generera vyn eller hantera
// det som förfrågas i HTTP.

// Rutterna definieras i G21\Config\Routes
// Rutterna genereras vid körning med G21\Libraries\Router

class Route {

    /**
     * Namnet på Routen
     * @var string
     */
    protected $name;

    /**
     * HTTP-metoden som används av Routen.
     * @var string
     */
    protected $method;

    /**
     * URI-mönstret som Routen svarar på.
     * @var string
     */
    protected $uri;

    /**
     * Vilken Controller som Routen hör till
     * @var string
     */
    protected $controller;

    /**
     * Vilken action som ska kallas.
     * @var string
     */
    protected $action;

    /**
     * De parametrar som Routens action kan behöva
     * @var array
     */
    //protected $parameters = array();

    /**
     * Skapa en ny Route-instans
     *
     * @param string $method
     * @param string $uri
     * @param array $action
     */
    public function __construct($method, $uri, $action)
    {
        $this->method = $method;
        $this->uri = $uri;
        $this->name = $action['as'];

        $segments = explode('@', $action['uses']);
        $this->controller = $segments[0];
        $this->action = $segments[1];

    }


    /**
     * Kör Routen och returnera svaret.
     * @return mixed
     */
    public function run()
    {
        //$parameters = array_filter($this->parameters, function($p) { return isset($p); } );
        //return call_user_func_array($this->action['uses'], $parameters);
    }

    /**
     * Hämta namnet på Routen
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Hämta HTTP-metoden för Routen
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Hämta URI för Routen
     * @return string
     */
    public function getUri()
    {
        return$this->uri;
    }

    /**
     * Hämta Controllern för routen
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Hämta action för Routen
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }





}