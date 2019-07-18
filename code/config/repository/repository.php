<?php

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

$container[UserWriterRepository::class] = function (ContainerInterface $container) {
    return new UserWriterRepository(
        $container->get('expenseWriterDatabase')
    );
};
