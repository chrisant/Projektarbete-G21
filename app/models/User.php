<?php namespace G21\Models;

use G21\Libraries\Model;

class User extends Model {

    protected $table = 'users';

    protected $fields = [
        'name',
        'email',
        'phone',
        'password',
        'salt'
        echo"hej";
    ];

    public $rules = [
        'name'              => 'required',
        'email'             => 'required|email',
        'phone'             => '',
        'password'          => 'required|match:confirm-password',
        'confirm-password'  => 'required'
    ];


}
