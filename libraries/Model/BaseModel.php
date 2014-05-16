<?php namespace G21\Libraries\Model;

class BaseModel {

    public function __construct()
    {
        // Skapa en ny instans av DB-objektet så vi kan hämta data från databasen.
    }


    public function sayHello()
    {
        return 'Hello World';
    }
}