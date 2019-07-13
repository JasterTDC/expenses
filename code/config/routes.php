<?php

use Interop\Container\ContainerInterface;
use ComAI\Expenses\Infrastructure\Controller\MainController;

$application->get('/', MainController::class);