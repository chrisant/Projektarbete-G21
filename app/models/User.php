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
    ];

    public $rules = [
        'name'              => 'required',
        'email'             => 'required|email',
        'phone'             => 'required',
        'password'          => 'required|match:confirm-password',
        'confirm-password'  => 'required'
    ];


}