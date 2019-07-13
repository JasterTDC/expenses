<?php

use Interop\Container\ContainerInterface;
use ComAI\Expenses\Infrastructure\Repository\ExpenseReadRepository;
use ComAI\Expenses\Infrastructure\Controller\MainController;

$container['expenseDatabase'] = function (ContainerInterface $container){
    $expenseDatabaseConfig = $container->get('settings')['expenseDatabase'];

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

$container[ExpenseReadRepository::class] = function (ContainerInterface $container){
    return new ExpenseReadRepository(
        $container->get('expenseDatabase')
    );
};

$container[MainController::class] = function (ContainerInterface $container){
    return new MainController();
};
