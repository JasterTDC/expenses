<?php


namespace ComAI\Expenses\Application\UseCase\User;

use ComAI\Expenses\Domain\Exception\UserEmptyException;
use ComAI\Expenses\Domain\Repository\UserReader;
use ComAI\Expenses\Domain\ValueObject\Email;
use ComAI\Expenses\Domain\ValueObject\Password;
use ComAI\Expenses\Domain\ValueObject\Username;

/**
 * Class LoginUserUseCase
 *
 * @package ComAI\Expenses\Application\UseCase\User
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class LoginUserUseCase
{

    /**
     * @var UserReader
     */
    protected $userReader;

    /**
     * LoginUserUseCase constructor.
     * @param UserReader $userReader
     */
    public function __construct(
        UserReader $userReader
    ) {
        $this->userReader = $userReader;
    }

    /**
     * @param LoginUserUseCaseArgument $argument
     *
     * @return LoginUserUseCaseResponse
     */
    public function handle(
        LoginUserUseCaseArgument $argument
    ) : LoginUserUseCaseResponse {

        $username   = null;
        $email      = null;
        $user       = null;

        try {
            if (!empty($argument->username())) {
                $username = Username::create($argument->username());
            }

            if (!empty($argument->email())) {
                $email = Email::create($argument->email());
            }

            if (!empty($username)) {
                $user = $this->userReader->getByUsername(
                    $username->username()
                );
            }

            if (!empty($email) && empty($user)) {
                $user = $this->userReader->getByEmail(
                    $email->email()
                );
            }

            if (!empty($user)) {
                if (password_verify($argument->password(), $user->password()->password())) {
                    return new LoginUserUseCaseResponse(
                        true,
                        200,
                        null,
                        $user
                    );
                }
            }

            return new LoginUserUseCaseResponse(
                false,
                400,
                'The selected user does not exist',
                null
            );
        } catch (UserEmptyException $e) {
            return new LoginUserUseCaseResponse(
                false,
                404,
                $e->getMessage(),
                null
            );
        } catch (\Exception $e) {
            return new LoginUserUseCaseResponse(
                false,
                400,
                $e->getMessage(),
                null
            );
        }
    }
}
