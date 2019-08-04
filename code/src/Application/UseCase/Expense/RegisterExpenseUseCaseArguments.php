<?php


namespace ComAI\Expenses\Application\UseCase\Expense;

/**
 * Class RegisterExpenseUseCaseArguments
 *
 * @package ComAI\Expenses\Application\UseCase\Expense
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class RegisterExpenseUseCaseArguments
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var string
     */
    protected $date;

    /**
     * RegisterExpenseUseCaseArguments constructor.
     *
     * @param string $name
     * @param float $price
     * @param string $date
     */
    public function __construct(
        string $name,
        float $price,
        string $date
    ) {
        $this->name = $name;
        $this->price = $price;
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function price(): float
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function date(): string
    {
        return $this->date;
    }
}
