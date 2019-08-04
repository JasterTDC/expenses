<?php


namespace ComAI\Expenses\Tests\Application\UseCase\User;

use ComAI\Expenses\Application\UseCase\Expense\RegisterExpenseUseCase;
use ComAI\Expenses\Application\UseCase\Expense\RegisterExpenseUseCaseArguments;
use ComAI\Expenses\Domain\Entity\Expense;
use ComAI\Expenses\Infrastructure\Factory\ExpenseFactory;
use ComAI\Expenses\Infrastructure\Repository\ExpenseWriterRepository;
use PHPUnit\Framework\TestCase;

/**
 * Class RegisterExpenseUseCaseTest
 *
 * @package ComAI\Expenses\Tests\Application\UseCase\User
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class RegisterExpenseUseCaseTest extends TestCase
{
    protected $expenseWriter;

    protected $expenseFactory;

    public function setUp(): void
    {
        parent::setUp();

        $this->expenseFactory = $this->getMockBuilder(ExpenseFactory::class)
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->disableOriginalClone()
            ->disableOriginalConstructor()
            ->getMock();

        $this->expenseWriter = $this->getMockBuilder(ExpenseWriterRepository::class)
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->disableOriginalClone()
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testIfArgumentsAreValidThenGiveValidResponse()
    {
        $arguments = new RegisterExpenseUseCaseArguments(
            'expense-test',
            102.99,
            '2019-01-01'
        );

        $expense = new Expense(
            null,
            'expense-test',
            102.99,
            \DateTime::createFromFormat('Y-m-d H:i:s', '2019-01-01 08:00:00'),
            \DateTime::createFromFormat('Y-m-d H:i:s', '2019-01-01 10:00:00'),
            \DateTime::createFromFormat('Y-m-d H:i:s', '2019-01-01 11:00:00')
        );

        $this->expenseFactory->method('create')
            ->willReturn($expense);

        $expense->setId(1);

        $this->expenseWriter->method('persist')
            ->willReturn($expense);

        $useCase = new RegisterExpenseUseCase(
            $this->expenseWriter,
            $this->expenseFactory
        );

        $response = $useCase->handle($arguments);

        $this->assertTrue($response->success());
        $this->assertEquals('expense-test', $response->expense()->name());
        $this->assertEquals(102.99, $response->expense()->price());
        $this->assertEquals(1, $response->expense()->id());
    }
}
