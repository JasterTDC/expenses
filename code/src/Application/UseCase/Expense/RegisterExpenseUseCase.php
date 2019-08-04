<?php


namespace ComAI\Expenses\Application\UseCase\Expense;

use ComAI\Expenses\Domain\Factory\ExpenseFactoryInterface;
use ComAI\Expenses\Domain\Repository\ExpenseWriter;

/**
 * Class RegisterExpenseUseCase
 *
 * @package ComAI\Expenses\Application\UseCase\Expense
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class RegisterExpenseUseCase
{

    /**
     * @var ExpenseWriter
     */
    protected $expenseWriter;

    /**
     * @var ExpenseFactoryInterface
     */
    protected $expenseFactory;

    /**
     * RegisterExpenseUseCase constructor.
     *
     * @param ExpenseWriter $expenseWriter
     * @param ExpenseFactoryInterface $expenseFactory
     */
    public function __construct(
        ExpenseWriter $expenseWriter,
        ExpenseFactoryInterface $expenseFactory
    ) {
        $this->expenseWriter = $expenseWriter;
        $this->expenseFactory = $expenseFactory;
    }

    /**
     * @param RegisterExpenseUseCaseArguments $argument
     *
     * @return RegisterExpenseUseCaseResponse
     */
    public function handle(
        RegisterExpenseUseCaseArguments $argument
    ) : RegisterExpenseUseCaseResponse {

        try {
            $expense = $this->expenseFactory->create(
                null,
                $argument->name(),
                $argument->date(),
                $argument->price(),
                null,
                null
            );

            $expense = $this->expenseWriter->persist($expense);

            return new RegisterExpenseUseCaseResponse(
                true,
                201,
                $expense,
                null
            );
        } catch (\Exception $e) {
            return new RegisterExpenseUseCaseResponse(
                false,
                400,
                null,
                $e->getMessage()
            );
        }
    }
}