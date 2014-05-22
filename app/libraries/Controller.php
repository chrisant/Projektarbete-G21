<?php namespace G21\Libraries;

class Controller {

    /**
     * Objektet av View-klassen
     *
     * @var View
     */
    protected $view;


    /**
     * Förbereder ett vyobjekt och spara ner ett eventuellt klassnamn från barnklassen.
     * Om vi instansierar validatorn i den här klassen krävs det mindre kod i varje
     * enskilld kontroller.
     *
     * @param string|null $childClass
     */
    public function __construct($childClass = null)
    {
        // Instansiera ett vyobjekt
        $this->view = new View();
    }

}