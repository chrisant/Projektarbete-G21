<?php namespace G21\App\Models;

echo 'This is shown when file for the dummy class is included';

use G21\Libraries\Model\BaseModel;

class Dummy extends BaseModel {

    public function __construct()
    {
        echo 'This is shown when the dummy class is instantiated';
    }

    public function sayHi()
    {
        return '<p>Hello world!</p>';
    }

}