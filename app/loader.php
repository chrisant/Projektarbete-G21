<?php

/*
 * Loader.php
 * Ladda alla filer som behövs
 * 
 */


/*
 * ----------------------------------------
 *  PATHS = CONSTANTS
 * ----------------------------------------
 *
 * En typ av variabler man kan ange värden på för att lätt använda senare.
 * Bra för att länka till filer med mera.
 *
 */

// Definiera serverns sökväg till vår applikation
define('APP_PATH', realpath(dirname(__FILE__)));

// Hämta nuvarande URL för att kunna skapa den offentliga URL-sökvägen
$path = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$public = isset($_SERVER['PATH_INFO']) ?
    'http://' . str_replace($_SERVER['PATH_INFO'], "", $path):
    rtrim('http://' . $path, '/');

// Definiera den publika sökvägen
define('PUBLIC_PATH', $public);



/*
 * ----------------------------------------
 *  Config
 * ----------------------------------------
 *
 * Inkludera klassen med alla konfigurationsvariabler.
 *
 */
include APP_PATH . '/libraries/Config.php';


/*
 * ----------------------------------------
 *  Felhantering
 * ----------------------------------------
 *
 * Alla error sidor och felmeddelanden ska fångas i olika exceptions.
 * Helt enkelt ska applikationen köra try-catch på de flesta requester.
 *
 */

include APP_PATH . '/libraries/Exceptions/NotFoundException.php';
include APP_PATH . '/libraries/Exceptions/InvalidViewException.php';


/*
 * ----------------------------------------
 *  Databasen
 * ----------------------------------------
 *
 * Inkludera klassen för databasen.
 *
 */
include APP_PATH . '/libraries/Database.php';


/*
 * ----------------------------------------
 *  Models
 * ----------------------------------------
 *
 * Modeller beskriver hur ett objekt ur databasen ska instansieras.
 * Här inkluderar vi grundmodellen som alla våra modeller bygger på.
 *
 */
include APP_PATH . '/libraries/Model.php';


/*
 * ----------------------------------------
 *  Validator
 * ----------------------------------------
 *
 * Klassen för validering
 *
 */
include APP_PATH . '/libraries/Validator.php';


/*
 * ----------------------------------------
 *  Views
 * ----------------------------------------
 *
 * Views används för att bygga upp själva sidorna användarna ser.
 * En kontroller skickar data från modeller till en vy som sedan
 * bygger upp en sida med de variablerna.
 *
 */
include APP_PATH . '/libraries/View/View.php';


/*
 * ----------------------------------------
 *  Controller
 * ----------------------------------------
 *
 * Grundkontrollern som alla övriga kontrollers bygger på.
 * Tillhandahåller grundfunktionaliteten
 *
 */
include APP_PATH . '/libraries/Controller.php';

/*
 * ----------------------------------------
 *  Routing
 * ----------------------------------------
 *
 * EJ FULLT FUNKTIONELL
 * Enkel routing körs inuti konstruktorn på Framework för tillfället.
 * Kanske lite väl avancerad routing för vårt projekt, men i en riktig app hade
 * routing nog implementerats mer åt det här hållet.
 *
 */
//include LIB . 'Routing/Router.php';
//include LIB . 'Routing/Route.php';
//include CONFIG . 'routes.php';



/*
 * ----------------------------------------
 *  Ladda applikationsklassen
 * ----------------------------------------
 *
 * Applikationsklassen som omsluter hela vår app.
 * Vidare i den här filen kan man kalla metoder i app-klassen för att justera
 * parametrar för applikationens körning, specifikt till det aktuella behovet.
 *
 */

require_once APP_PATH . '/libraries/Framework/application.php';
