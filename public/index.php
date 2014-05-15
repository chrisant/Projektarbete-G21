<?php

/*
 * För att förenkla utvecklingen använder vi följande rad:
 */
error_reporting(E_ALL);

/*
 * Ladda de filer som behövs
 */
require_once __DIR__.'/../autoload.php';
require __DIR__ . '/../libraries/bootstrap.php';

// Instantiera vår app
$app = new Bootstrap();

