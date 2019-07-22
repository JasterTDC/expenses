<?php


namespace ComAI\Expenses\Tests\Application\UseCase\User;

use ComAI\Expenses\Application\UseCase\User\RegisterUserUseCase;
use ComAI\Expenses\Application\UseCase\User\RegisterUserUserCaseArgument;
use ComAI\Expenses\Domain\Entity\User;
use ComAI\Expenses\Domain\Exception\EmailInvalidException;
use ComAI\Expenses\Domain\Exception\UsernameCapitalLetterException;
use ComAI\Expenses\Domain\Exception\UsernameWhiteSpaceException;
use ComAI\Expenses\Domain\Factory\UserFactoryInterface;
use ComAI\Expenses\Domain\Repository\UserWriter;
use ComAI\Expenses\Domain\ValueObject\Email;
use ComAI\Expenses\Domain\ValueObject\Password;
use ComAI\Expenses\Domain\ValueObject\Username;
use PHPUnit\Framework\TestCase;

/**
 * Class RegisterUserUseCaseTest
 *
 * @package ComAI\Expenses\Tests\Application\UseCase
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class RegisterUserUseCaseTest extends TestCase
{

    protected $userWriter;

    protected $userFactory;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userWriter = $this->getMockBuilder(UserWriter::class)
            ->disableArgumentCloning()
            ->disableOriginalClone()
            ->disableOriginalConstructor()
            ->disallowMockingUnknownTypes()
            ->getMock();

        $this->userFactory = $this->getMockBuilder(UserFactoryInterface::class)
            ->disableArgumentCloning()
            ->disableOriginalClone()
            ->disableOriginalConstructor()
            ->disallowMockingUnknownTypes()
            ->getMock();
    }

    public function testIfArgumentsAreValidAndUserIsPersistedSuccessfully()
    {
        $user = new User(
            null,
            Username::create('username'),
            Email::create('email@email.com'),
            Password::create('password123456')
        );

        $this->userFactory->method('create')
            ->willReturn($user);

        $user->setId(1);

        $this->userWriter->method('persist')
            ->willReturn($user);

        $arguments = new RegisterUserUserCaseArgument(
            'username',
            'email@email.com',
            'user123456'
        );

        $useCase = new RegisterUserUseCase(
            $this->userWriter,
            $this->userFactory
        );

        $response = $useCase->handle($arguments);

        $this->assertTrue($response->success());
        $this->assertEquals(201, $response->httpStatusCode());
    }

    public function testIfUsernameHasCapitalLettersAndUserIsNotPersisted()
    {
        $this->expectException(UsernameCapitalLetterException::class);

        $user = new User(
            null,
            Username::create('Us3rN4m3'),
            Email::create('email@email.com'),
            Password::create('password123456')
        );

        $this->userFactory->method('create')
            ->willReturn($user);

        $arguments = new RegisterUserUserCaseArgument(
            'Us3rN4m3',
            'email@email.com',
            'user123456'
        );

        $useCase = new RegisterUserUseCase(
            $this->userWriter,
            $this->userFactory
        );

        $response = $useCase->handle($arguments);

        $this->assertTrue($response->success());
    }

    public function testIfUsernameHasWhiteSpaceAndUserIsNotPersisted()
    {
        $this->expectException(UsernameWhiteSpaceException::class);

        $user = new User(
            null,
            Username::create('Us3r N4m3'),
            Email::create('email@email.com'),
            Password::create('password123456')
        );

        $this->userFactory->method('create')
            ->willReturn($user);

        $arguments = new RegisterUserUserCaseArgument(
            'Us3rN4m3',
            'email@email.com',
            'user123456'
        );

        $useCase = new RegisterUserUseCase(
            $this->userWriter,
            $this->userFactory
        );

        $response = $useCase->handle($arguments);

        $this->assertTrue($response->success());
    }

    public function testIfEmailIsInvalidAndUserIsNotPersisted()
    {
        $this->expectException(EmailInvalidException::class);

        $user = new User(
            null,
            Username::create('username'),
            Email::create('email.com'),
            Password::create('password123456')
        );

        $this->userFactory->method('create')
            ->willReturn($user);

        $arguments = new RegisterUserUserCaseArgument(
            'Us3rN4m3',
            'email@email.com',
            'user123456'
        );

        $useCase = new RegisterUserUseCase(
            $this->userWriter,
            $this->userFactory
        );

        $response = $useCase->handle($arguments);

        $this->assertFalse($response->success());
    }
}