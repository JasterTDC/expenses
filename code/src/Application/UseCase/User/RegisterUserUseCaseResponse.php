<?php


namespace ComAI\Expenses\Application\UseCase\User;

use ComAI\Expenses\Domain\Entity\User;

/**
 * Class RegisterUserUseCaseResponse
 *
 * @package ComAI\Expenses\Application\UseCase\User
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class RegisterUserUseCaseResponse
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
     * @var User|null
     */
    protected $user;

    /**
     * @var string|null
     */
    protected $error;

    /**
     * RegisterUserUseCaseResponse constructor.
     * @param bool $success
     * @param int $httpStatusCode
     * @param User|null $user
     * @param string|null $error
     */
    public function __construct(
        bool $success,
        int $httpStatusCode,
        ?User $user,
        ?string $error
    ) {
        $this->success = $success;
        $this->httpStatusCode = $httpStatusCode;
        $this->user = $user;
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
     * @return User|null
     */
    public function user(): ?User
    {
        return $this->user;
    }

    /**
     * @return string|null
     */
    public function error(): ?string
    {
        return $this->error;
    }
}
