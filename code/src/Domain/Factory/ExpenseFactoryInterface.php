<?php


namespace ComAI\Expenses\Domain\Factory;

use ComAI\Expenses\Domain\Entity\Expense;

/**
 * Interface ExpenseFactoryInterface
 *
 * @package ComAI\Expenses\Domain\Factory
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
interface ExpenseFactoryInterface
{

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
    ) : Expense ;

}
