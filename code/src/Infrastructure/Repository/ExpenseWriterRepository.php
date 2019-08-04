<?php


namespace ComAI\Expenses\Infrastructure\Repository;

use ComAI\Expenses\Domain\Entity\Expense;
use ComAI\Expenses\Domain\Exception\ExpensePersistenceException;
use ComAI\Expenses\Domain\Repository\ExpenseWriter;

/**
 * Class ExpenseWriterRepository
 *
 * @package ComAI\Expenses\Infrastructure\Repository
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class ExpenseWriterRepository implements ExpenseWriter
{
    /**
     * @var \PDO
     */
    protected $pdo;

    /**
     * @var string
     */
    protected $format;

    /**
     * ExpenseWriterRepository constructor.
     *
     * @param \PDO $pdo
     * @param string $format
     */
    public function __construct(
        \PDO $pdo,
        string $format
    ) {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        $this->format = $format;
    }

    /**
     * @param Expense $expense
     *
     * @return Expense
     * @throws ExpensePersistenceException
     */
    public function persist(Expense $expense) : Expense
    {
        if (empty($expense->id())) {
            return $this->insertExpense($expense);
        }

        return $expense;
    }

    /**
     * @param Expense $expense
     *
     * @return Expense
     * @throws ExpensePersistenceException
     */
    protected function insertExpense(Expense $expense) : Expense
    {
        $sql = 'INSERT INTO `expenses`.`expenses`(
            `name`,
            `price`,
            `date`,
            `createdAt`,
            `modifiedAt`
        ) VALUES 
        (:name, :price, :date, :createdAt, :modifiedAt)
        ';

        $parameters = [
            'name'          => $expense->name(),
            'price'         => $expense->price(),
            'date'          => $expense->date()->format($this->format),
            'createdAt'     => $expense->createdAt()->format($this->format),
            'modifiedAt'    => $expense->modifiedAt()->format($this->format)
        ];

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);

            $expense->setId((int) $this->pdo->lastInsertId());

            return $expense;
        } catch (\PDOException $e) {
            throw new ExpensePersistenceException();
        }
    }
}
