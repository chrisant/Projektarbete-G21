<?php namespace G21\App\Models;

use G21\Libraries\Model;

class User extends Model {

    protected $table = 'users';
    protected $fields = ['name', 'email', 'phone', 'password', 'salt'];

}