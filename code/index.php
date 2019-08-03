<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/constants.php';

// Load configuration using the application environment
$config = require_once __DIR__ . '/config/' . APPLICATION_ENV . '.php';

use Slim\App;

ini_set('display_errors', true);

error_reporting(E_ALL);

$application = new App($config);

$container = $application->getContainer();

require_once __DIR__ . '/config/dependencies.php';
require_once __DIR__ . '/config/routes.php';

$application->run();
