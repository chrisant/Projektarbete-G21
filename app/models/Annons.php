<?php namespace G21\App\Models;

use G21\Libraries\Model\Model;

class Annons extends Model {

    protected $table = '';
    
        protected $fields = [

    	'description',
    	'id',
    	'images',
    	'title',
    	'updated'
    ];

    public $rules = [

    	'images'      => '',
    	'title'		  => 'required',
    	'description' => 'required',   	
    ];

}
