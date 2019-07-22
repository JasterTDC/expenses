<?php

use ComAI\Expenses\Infrastructure\Factory\UserFactory;
use ComAI\Expenses\Infrastructure\Repository\UserReaderRepository;
use ComAI\Expenses\Infrastructure\Repository\UserWriterRepository;
use Psr\Container\ContainerInterface;

$container['expenseWriterDatabase'] = function (ContainerInterface $container) {
    $expenseDatabaseConfig = $container->get('settings')['expenseWriterDatabase'];

    $dsn = "{$expenseDatabaseConfig['engine']}:host={$expenseDatabaseConfig['hostname']};".
        "charset={$expenseDatabaseConfig['charset']};".
        "port={$expenseDatabaseConfig['port']};".
        "dbname={$expenseDatabaseConfig['database']}";

    return new PDO(
        $dsn,
        $expenseDatabaseConfig['username'],
        $expenseDatabaseConfig['password']
    );
};

$container['expenseReaderDatabase'] = function (ContainerInterface $container) {
    $expenseDatabaseConfig = $container->get('settings')['expenseReaderDatabase'];

    $dsn = "{$expenseDatabaseConfig['engine']}:host={$expenseDatabaseConfig['hostname']};".
        "charset={$expenseDatabaseConfig['charset']};".
        "port={$expenseDatabaseConfig['port']};".
        "dbname={$expenseDatabaseConfig['database']}";

    return new PDO(
        $dsn,
        $expenseDatabaseConfig['username'],
        $expenseDatabaseConfig['password']
    );
};

$container[UserWriterRepository::class] = function (ContainerInterface $container) {
    return new UserWriterRepository(
        $container->get('expenseWriterDatabase')
    );
};

$container[UserReaderRepository::class] = function (ContainerInterface $container) {
    return new UserReaderRepository(
        $container->get('expenseReaderDatabase'),
        $container->get(UserFactory::class)
    );
};
