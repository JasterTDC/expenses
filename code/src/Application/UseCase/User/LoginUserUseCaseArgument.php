<?php


namespace ComAI\Expenses\Application\UseCase\User;

/**
 * Class LoginUserUseCaseArgument
 *
 * @package ComAI\Expenses\Application\UseCase\User
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class LoginUserUseCaseArgument
{

    /**
     * @var string|null
     */
    protected $username;

    /**
     * @var string|null
     */
    protected $email;

    /**
     * @var string
     */
    protected $password;

    /**
     * LoginUserUseCaseArgument constructor.
     *
     * @param string|null $username
     * @param string|null $email
     * @param string $password
     */
    public function __construct(
        ?string $username,
        ?string $email,
        string $password
    ) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return string|null
     */
    public function username(): ?string
    {
        return $this->username;
    }

    /**
     * @return string|null
     */
    public function email(): ?string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function password(): string
    {
        return $this->password;
    }
}
