<?php

use ComAI\Expenses\Infrastructure\Controller\Expense\RegisterExpenseController;
use ComAI\Expenses\Infrastructure\Controller\User\LoginUserController;
use ComAI\Expenses\Infrastructure\Controller\MainController;
use ComAI\Expenses\Infrastructure\Controller\User\LogoutController;
use ComAI\Expenses\Infrastructure\Controller\User\RegisterUserController;

/** @var Slim\App $application */
$application->get('/', MainController::class);

$application->group('/user', function () {
    $this->post('/register', RegisterUserController::class);
    $this->post('/login', LoginUserController::class);
    $this->post('/logout', LogoutController::class);
});

$application->group('/expense', function() {
    $this->post('/register', RegisterExpenseController::class);
});
