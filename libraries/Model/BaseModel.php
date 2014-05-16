<?php namespace G21\Libraries\Model;

// Ska vara en abstrakt klass
class BaseModel {

    public function __construct()
    {
        // Skapa en ny instans av DB-objektet så vi kan hämta data från databasen.
    }


    // Bara för att testa att det går att skriva ut data i vyn från modellerna
    // detta ska flyttas till barnklasserna.
    public function sayHello()
    {
        return 'Hello World';
    }
}