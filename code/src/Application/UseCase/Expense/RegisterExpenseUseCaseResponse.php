<?php


namespace ComAI\Expenses\Application\UseCase\Expense;

use ComAI\Expenses\Domain\Entity\Expense;

/**
 * Class RegisterExpenseUseCaseResponse
 *
 * @package ComAI\Expenses\Application\UseCase\Expense
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class RegisterExpenseUseCaseResponse
{

    /**
     * @var bool
     */
    protected $success;

    /**
     * @var int
     */
    protected $httpStatusCode;

    /**
     * @var Expense|null
     */
    protected $expense;

    /**
     * @var string|null
     */
    protected $error;

    /**
     * RegisterExpenseUseCaseResponse constructor.
     *
     * @param bool $success
     * @param int $httpStatusCode
     * @param Expense|null $expense
     * @param string|null $error
     */
    public function __construct(
        bool $success,
        int $httpStatusCode,
        ?Expense $expense,
        ?string $error
    ) {
        $this->success = $success;
        $this->httpStatusCode = $httpStatusCode;
        $this->expense = $expense;
        $this->error = $error;
    }

    /**
     * @return bool
     */
    public function success(): bool
    {
        return $this->success;
    }

    /**
     * @return int
     */
    public function httpStatusCode(): int
    {
        return $this->httpStatusCode;
    }

    /**
     * @return Expense|null
     */
    public function expense(): ?Expense
    {
        return $this->expense;
    }

    /**
     * @return string|null
     */
    public function error(): ?string
    {
        return $this->error;
    }
}
