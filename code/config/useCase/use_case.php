<?php

use ComAI\Expenses\Application\UseCase\User\LoginUserUseCase;
use ComAI\Expenses\Application\UseCase\User\RegisterUserUseCase;
use ComAI\Expenses\Infrastructure\Factory\UserFactory;
use ComAI\Expenses\Infrastructure\Repository\UserReaderRepository;
use ComAI\Expenses\Infrastructure\Repository\UserWriterRepository;
use Psr\Container\ContainerInterface;

$container[RegisterUserUseCase::class] = function (ContainerInterface $container) {
    return new RegisterUserUseCase(
        $container->get(UserWriterRepository::class),
        $container->get(UserFactory::class)
    );
};

$container[LoginUserUseCase::class] = function (ContainerInterface $container) {
    return new LoginUserUseCase(
        $container->get(UserReaderRepository::class)
    );
};
