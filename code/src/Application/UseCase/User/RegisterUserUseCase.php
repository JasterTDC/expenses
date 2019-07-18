<?php


namespace ComAI\Expenses\Application\UseCase\User;

use ComAI\Expenses\Domain\Factory\UserFactoryInterface;
use ComAI\Expenses\Domain\Repository\UserWriter;

/**
 * Class RegisterUserUseCase
 *
 * @package ComAI\Expenses\Application\UseCase\User
 */
class RegisterUserUseCase
{

    /**
     * @var UserWriter
     */
    protected $userWriterRepository;

    /**
     * @var UserFactoryInterface
     */
    protected $userFactory;

    /**
     * RegisterUserUseCase constructor.
     * @param UserWriter $userWriterRepository
     * @param UserFactoryInterface $userFactory
     */
    public function __construct(
        UserWriter $userWriterRepository,
        UserFactoryInterface $userFactory
    ) {
        $this->userWriterRepository = $userWriterRepository;
        $this->userFactory = $userFactory;
    }

    /**
     * @param RegisterUserUserCaseArgument $argument
     *
     * @return RegisterUserUseCaseResponse
     */
    public function handle(
        RegisterUserUserCaseArgument $argument
    ) : RegisterUserUseCaseResponse {

        try {
            $user = $this->userFactory->create(
                null,
                $argument->username(),
                $argument->email(),
                $argument->password()
            );

            $user = $this->userWriterRepository->persist($user);

            return new RegisterUserUseCaseResponse(
                true,
                201,
                $user,
                null
            );
        } catch (\Exception $exception) {
            return new RegisterUserUseCaseResponse(
                false,
                400,
                null,
                $exception->getMessage()
            );
        }
    }
}
