<?php namespace G21\Libraries;

class Database extends \PDO {

    /*
     * PDO = PHP Data Object.
     * Det bästa sättet att ansluta till databaser i PHP.
     *
     * Den här klassen finns bara för att slippa skriva in databasinformationen
     * varje gång vi behöver komma åt databasen i vår applikation.
     * Vi instansierar helt enkelt den här klassen, så instansierar den sin
     * förälderklass automatiskt med vår databasinformation.
     */

    public function __construct()
    {
        parent::__construct(

            // Stoppar ihop: 'mysql:dbname=DB;host=HOST'
            Config::DB_Driver . ':' .
            'dbname=' . Config::DB_name . ';' .
            'host=' . Config::DB_Host,

            Config::DB_User,
            Config::DB_Pwd,
            Config::DB_Opt
        );
    }
}