<?php

use ComAI\Expenses\Infrastructure\Controller\LoginUserController;
use ComAI\Expenses\Infrastructure\Controller\MainController;
use ComAI\Expenses\Infrastructure\Controller\RegisterUserController;

/** @var Slim\App $application */
$application->get('/', MainController::class);

$application->group('/user', function () {
    $this->post('/register', RegisterUserController::class);
    $this->post('/login', LoginUserController::class);
});
