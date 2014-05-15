<?php

/*
 * ----------------------------------------
 *  CONSTANTS
 * ----------------------------------------
 *
 * En typ av variabler man kan ange värden på för att lätt använda senare.
 * Bra för att länka till filer med mera.
 *
 */

define('ROOT',          realpath(dirname(__FILE__)) . '/');
define('APP',           realpath(dirname(__FILE__)) . '/app/');
define('LIB',           realpath(dirname(__FILE__)) . '/libraries/');
define('CONFIG',        realpath(dirname(__FILE__)) . '/config/');
define('PUBLIC_PATH',   realpath(dirname(__FILE__)) . '/public/'); // Ändra till att detecta serverns URL....


/*
 * ----------------------------------------
 *  Felhantering
 * ----------------------------------------
 *
 * Alla error sidor och felmeddelanden ska fångas i olika exceptions.
 * Helt enkelt ska applikationen köra try-catch på de flesta requester.
 *
 */

include LIB . 'Exceptions/NotFoundException.php';

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

include LIB . 'View/Helpers.php';
include LIB . 'View/View.php';


/*
 * ----------------------------------------
 *  Routing
 * ----------------------------------------
 *
 * EJ FULLT FUNKTIONELL
 * Enkel routing körs inuti konstruktorn på Bootstrap för tillfället.
 *
 */

include LIB . 'Routing/Controller.php';
//include LIB . 'Routing/Router.php';
//include LIB . 'Routing/Route.php';
//include CONFIG . 'routes.php';

/*
 * Kanske lite väl avancerad routing för vårt projekt, men i en riktig app hade
 * routing nog implementerats mer åt det här hållet.
 */
