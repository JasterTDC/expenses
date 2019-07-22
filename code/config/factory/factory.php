<?php

use ComAI\Expenses\Infrastructure\Factory\EmailFactory;
use ComAI\Expenses\Infrastructure\Factory\PasswordFactory;
use ComAI\Expenses\Infrastructure\Factory\UserFactory;
use ComAI\Expenses\Infrastructure\Factory\UsernameFactory;
use Psr\Container\ContainerInterface;

$container[UsernameFactory::class] = function () {
    return new UsernameFactory();
};

$container[EmailFactory::class] = function () {
    return new EmailFactory();
};

$container[PasswordFactory::class] = function () {
    return new PasswordFactory();
};

$container[UserFactory::class] = function (ContainerInterface $container) {
    return new UserFactory(
        $container->get(UsernameFactory::class),
        $container->get(PasswordFactory::class),
        $container->get(EmailFactory::class)
    );
};
