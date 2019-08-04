<?php


namespace ComAI\Expenses\Infrastructure\Factory;

use ComAI\Expenses\Domain\Entity\Expense;
use ComAI\Expenses\Domain\Exception\ExpenseDateException;
use ComAI\Expenses\Domain\Exception\ExpenseModificationDateException;
use ComAI\Expenses\Domain\Factory\ExpenseFactoryInterface;

/**
 * Class ExpenseFactory
 *
 * @package ComAI\Expenses\Infrastructure\Factory
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class ExpenseFactory implements ExpenseFactoryInterface
{

    /**
     * @var string
     */
    protected $format;

    /**
     * ExpenseFactory constructor.
     *
     * @param string $format
     */
    public function __construct(
        string $format
    ) {
        $this->format = $format;
    }

    /**
     * @param int|null $id
     * @param string $name
     * @param string $date
     * @param float $price
     * @param string|null $createdAt
     * @param string|null $modifiedAt
     * @return Expense
     *
     * @throws \Exception
     */
    public function create(
        ?int $id,
        string $name,
        string $date,
        float $price,
        ?string $createdAt,
        ?string $modifiedAt
    ) : Expense {
        $createdDate = new \DateTime();
        $modifiedDate = new \DateTime();

        $expenseDate = \DateTime::createFromFormat($this->format, $date);

        if (!empty($createdAt)) {
            $createdDate = \DateTime::createFromFormat($this->format, $createdAt);
        }

        if (!empty($modifiedAt)) {
            $modifiedDate = \DateTime::createFromFormat($this->format, $modifiedAt);
        }

        if (empty($expenseDate)) {
            throw new ExpenseDateException();
        }

        if (empty($createdDate)) {
            throw new ExpenseModificationDateException();
        }

        if (empty($modifiedDate)) {
            throw new ExpenseModificationDateException();
        }

        return new Expense(
            $id,
            $name,
            $price,
            $expenseDate,
            $createdDate,
            $modifiedDate
        );
    }

}
