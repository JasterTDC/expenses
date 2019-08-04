<?php

use ComAI\Expenses\Application\UseCase\Expense\RegisterExpenseUseCase;
use ComAI\Expenses\Application\UseCase\User\LoginUserUseCase;
use ComAI\Expenses\Application\UseCase\User\RegisterUserUseCase;
use ComAI\Expenses\Infrastructure\Controller\Expense\RegisterExpenseController;
use ComAI\Expenses\Infrastructure\Controller\User\LoginUserController;
use ComAI\Expenses\Infrastructure\Controller\MainController;
use ComAI\Expenses\Infrastructure\Controller\User\RegisterUserController;
use Interop\Container\ContainerInterface;

$container[MainController::class] = function () {
    return new MainController();
};

$container[RegisterUserController::class] = function (ContainerInterface $container) {
    return new RegisterUserController(
        $container->get(RegisterUserUseCase::class)
    );
};

$container[LoginUserController::class] = function (ContainerInterface $container) {
    return new LoginUserController(
        $container->get(LoginUserUseCase::class)
    );
};

$container[RegisterExpenseController::class] = function (ContainerInterface $container) {
    return new RegisterExpenseController(
        $container->get(RegisterExpenseUseCase::class)
    );
};
