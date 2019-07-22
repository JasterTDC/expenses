<?php


namespace ComAI\Expenses\Application\UseCase\User;

use ComAI\Expenses\Domain\Entity\User;

/**
 * Class LoginUserUseCaseResponse
 *
 * @package ComAI\Expenses\Application\UseCase\User
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class LoginUserUseCaseResponse
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
     * @var string|null
     */
    protected $error;

    /**
     * @var User|null
     */
    protected $user;

    /**
     * LoginUserUseCaseResponse constructor.
     *
     * @param bool $success
     * @param int $httpStatusCode
     * @param string|null $error
     * @param User|null $user
     */
    public function __construct(
        bool $success,
        int $httpStatusCode,
        ?string $error,
        ?User $user
    ) {
        $this->success = $success;
        $this->httpStatusCode = $httpStatusCode;
        $this->error = $error;
        $this->user = $user;
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
     * @return string|null
     */
    public function error(): ?string
    {
        return $this->error;
    }

    /**
     * @return User|null
     */
    public function user(): ?User
    {
        return $this->user;
    }
}
