<?php namespace G21\Models;

use G21\Libraries\Model;

class User extends Model {

    protected $table = 'users';

    protected $fields = [
        'name',
        'email',
        'phone',
        'password',
        'confirm-password',
        'salt'
    ];

    protected $ignored = [
        'confirm-password'
    ];

    protected $rules = [
        'name'      => 'required',
        'email'     => 'required|email',
        'phone'     => '',
        'password'  => 'required|match:confirm-password',
        'confirm-password'  => 'required|match:password',
        'salt'      => 'required'
    ];


}