<?php

namespace ComAI\Expenses\Infrastructure\Repository;

/**
 * ExpenseReadRepository
 *
 * @author Ismael Moral <jastertdc@email.com>
 */
class ExpenseReadRepository
{
    /**
     * PDO connection
     *
     * @var \PDO
     */
    protected $pdo;

    /**
     * ExpenseReadRepository constructor
     *
     * @param \PDO $pdo
     */
    public function __construct(
        \PDO $pdo
    ) {
        $this->pdo = $pdo;
    }
}
