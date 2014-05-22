<?php namespace G21\Controllers;

use G21\Libraries\Controller;

class AnnonsController extends Controller {

    public function index()
    {
        echo 'annons.index';
    }

    public function visa($id)
    {
        // find annons by id

        // assign annons to view
        $this->view->annons = $id;

        return $this->view->render('annons.show');
    }

    public function skapa()
    {
        if (!empty($_SESSION))
            return $this->view->render('annons.create');
    }

    public function spara()
    {
        // Instansiera ett objekt av typen annons

        // hämta en validator med annonsens valideringsregler

        // validera input

        // generera egen data:

        // Skapa taggar
            // instansiera objekt av typen "tag"

        // Länka taggarna till annonsen
            // dvs skapa annons-tag-pivot värden

        // Meddela användaren om resultatet

    }

}