<?php
/*
 * ----------------------------------------
 *  Visa alla fel & varningar
 * ----------------------------------------
 *
 * Under utvecklingen visar vi mer än det som vanligtvis visar om
 * något är fel i vår kod. Även varningar som inte får applikationen
 * att krascha kommer visas i webbläsaren.
 *
 */


error_reporting(E_ALL);


/*
 * ----------------------------------------
 *  Registrera autoloadern
 * ----------------------------------------
 *
 * Ladda alla de filer som behövs för att starta
 *
 */

require __DIR__.'/../autoload.php';


/*
 * ----------------------------------------
 *  Starta applikationen
 * ----------------------------------------
 *
 * Här instansierar vi applikationen så vi kan använda vårat framework.
 *
 */
$app = new \G21\Libraries\Framework\Application();




