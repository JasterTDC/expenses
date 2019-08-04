<?php


namespace ComAI\Expenses\Domain\Repository;

use ComAI\Expenses\Domain\Entity\Expense;
use ComAI\Expenses\Domain\Exception\ExpensePersistenceException;

/**
 * Interface ExpenseWriter
 *
 * @package ComAI\Expenses\Domain\Repository
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
interface ExpenseWriter
{
    /**
     * @param Expense $expense
     *
     * @return Expense
     * @throws ExpensePersistenceException
     */
    public function persist(Expense $expense) : Expense;
}
