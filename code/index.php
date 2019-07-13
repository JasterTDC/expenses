<?php

require_once __DIR__ . '/vendor/autoload.php';

use Slim\App;

ini_set('display_errors', true);

error_reporting(E_ALL);

$application = new App();

$container = $application->getContainer();

$application->run();