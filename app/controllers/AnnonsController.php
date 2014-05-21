<?php namespace G21\App\Controllers;

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
        return $this->view->render('annons.create');
    }

}