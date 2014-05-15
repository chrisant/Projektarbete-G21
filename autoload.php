<?php

// Definiera variabler för att enkelt kunna länka till vår applikations filer.
// Det är bra att definiera dessa för att undvika problem ifall mappstrukturen
// skulle ändras i framtiden.
define('ROOT', realpath(dirname(__FILE__)) . '/');
define('APP', realpath(dirname(__FILE__)) . '/app/');
define('LIB', realpath(dirname(__FILE__)) . '/libraries/');
define('PUBLIC_PATH', realpath(dirname(__FILE__)) . '/public/');

// Felhantering
include LIB . 'Exceptions/NotFoundException.php';

// Inkludera Views
include LIB . 'View/Helpers.php';
include LIB . 'View/View.php';


// Ej komplett routing.
// Kanske lite väl avancerad routing för vårt projekt, men i en riktig app hade
// Routing nog implementerats mer åt det här hållet.

// Inkludera Routing
include LIB . 'Routing/Controller.php';
//include BASE_PATH . 'libraries/Routing/Router.php';
//include BASE_PATH . 'libraries/Routing/Route.php';
//include BASE_PATH . 'config/routes.php';

