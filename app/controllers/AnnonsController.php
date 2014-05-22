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
        $input = [
        'description' => str_replace( $_POST['description']),
    	'images'      => str_replace( $_POST['images']),
    	'title'       => str_replace( $_POST['title'])
    	];
        
        
        // Instansiera ett objekt av typen annons
        $annons = new Annons();
        // hämta en validator med annonsens valideringsregler
        $validator = new Validator(@annons -> rules);
        // validera input
        $errors  = $validator->validate($input);
        // generera egen data:
        $author = $_SESSION['id'];
        // Skapa taggar
            // instansiera objekt av typen "tag"
        $array = explode(' ', $input['title']);
        $array[] = explode(',', $_POST['label']);
        // Länka taggarna till annonsen
            // dvs skapa annons-tag-pivot värden
        $annons->create([
        'description' => $input['description'],
    	'images'      => $input['images'],
    	'title'       => $input['title'], 
        'author'      => $input['author']
            
        ]);    
        $annons-> save();
        $id = $annons->id;
        
        foreach($array as $tags)
        {
            $tag = new Tag($tag);
            $pivot = new Pivot($id, $tag-id)
            
        }
        // Meddela användaren om resultatet
        $_SESSION['message'] = 'Din annons är nu skapad!';

    }

}
