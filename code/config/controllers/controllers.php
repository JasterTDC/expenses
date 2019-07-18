<?php

use ComAI\Expenses\Application\UseCase\User\RegisterUserUseCase;
use ComAI\Expenses\Infrastructure\Controller\MainController;
use ComAI\Expenses\Infrastructure\Controller\RegisterUserController;
use Interop\Container\ContainerInterface;

$container[MainController::class] = function () {
    return new MainController();
};

$container[RegisterUserController::class] = function (ContainerInterface $container) {
    return new RegisterUserController(
        $container->get(RegisterUserUseCase::class)
    );
};
