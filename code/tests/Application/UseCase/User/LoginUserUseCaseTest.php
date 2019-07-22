<?php


namespace ComAI\Expenses\Tests\Application\UseCase\User;

use ComAI\Expenses\Application\UseCase\User\LoginUserUseCase;
use ComAI\Expenses\Application\UseCase\User\LoginUserUseCaseArgument;
use ComAI\Expenses\Domain\Entity\User;
use ComAI\Expenses\Domain\Exception\UserEmptyException;
use ComAI\Expenses\Domain\Factory\UserFactoryInterface;
use ComAI\Expenses\Domain\Repository\UserReader;
use ComAI\Expenses\Domain\ValueObject\Email;
use ComAI\Expenses\Domain\ValueObject\Password;
use ComAI\Expenses\Domain\ValueObject\Username;
use PHPUnit\Framework\TestCase;

/**
 * Class LoginUserUseCaseTest
 *
 * @package ComAI\Expenses\Tests\Application\UseCase\User
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class LoginUserUseCaseTest extends TestCase
{

    protected $userReaderRepository;

    protected $userFactory;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userReaderRepository = $this->getMockBuilder(UserReader::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disallowMockingUnknownTypes()
            ->disableArgumentCloning()
            ->getMock();

        $this->userFactory = $this->getMockBuilder(UserFactoryInterface::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disallowMockingUnknownTypes()
            ->disableArgumentCloning()
            ->getMock();
    }

    public function testIfUsernameAndPasswordAreSentThenGiveValidResponse()
    {
        $arguments = new LoginUserUseCaseArgument(
            'test',
            null,
            'testPassword'
        );

        $this->userReaderRepository->method('getByUsername')
            ->willReturn(
                new User(
                    1,
                    Username::create('test'),
                    Email::create('test@email.com'),
                    Password::create('testPassword')
                )
            );

        $useCase = new LoginUserUseCase(
            $this->userReaderRepository
        );

        $response = $useCase->handle($arguments);

        $this->assertTrue($response->success());
        $this->assertEquals(200, $response->httpStatusCode());
    }

    public function testIfEmailAndPasswordAreSentThenGiveValidResponse()
    {
        $arguments = new LoginUserUseCaseArgument(
            null,
            'test@email.com',
            'testPassword'
        );

        $this->userReaderRepository->method('getByEmail')
            ->willReturn(
                new User(
                    1,
                    Username::create('test'),
                    Email::create('test@email.com'),
                    Password::create('testPassword')
                )
            );

        $useCase = new LoginUserUseCase(
            $this->userReaderRepository
        );

        $response = $useCase->handle($arguments);

        $this->assertTrue($response->success());
        $this->assertEquals(200, $response->httpStatusCode());
    }

    public function testIfEmailDoesNotExistThenGiveValidResponse()
    {
        $arguments = new LoginUserUseCaseArgument(
            null,
            'test@email.com',
            'testPassword'
        );

        $this->userReaderRepository->method('getByEmail')
            ->will($this->throwException(new UserEmptyException()));

        $useCase = new LoginUserUseCase(
            $this->userReaderRepository
        );

        $response = $useCase->handle($arguments);

        $this->assertFalse($response->success());
        $this->assertEquals(404, $response->httpStatusCode());
    }

    public function testIfUsernameDoesNotExistThenGiveValidResponse()
    {
        $arguments = new LoginUserUseCaseArgument(
            'test',
            null,
            'testPassword'
        );

        $this->userReaderRepository->method('getByUsername')
            ->will($this->throwException(new UserEmptyException()));

        $useCase = new LoginUserUseCase(
            $this->userReaderRepository
        );

        $response = $useCase->handle($arguments);

        $this->assertFalse($response->success());
        $this->assertEquals(404, $response->httpStatusCode());
    }

    public function testIfArgumentsAreInvalidThenGiveValidResponse()
    {
        $arguments = new LoginUserUseCaseArgument(
            null,
            null,
            'testPassword'
        );

        $useCase = new LoginUserUseCase(
            $this->userReaderRepository
        );

        $response = $useCase->handle($arguments);

        $this->assertFalse($response->success());
        $this->assertEquals(400, $response->httpStatusCode());
    }
}