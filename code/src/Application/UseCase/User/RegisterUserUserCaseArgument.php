<?php


namespace ComAI\Expenses\Application\UseCase\User;

/**
 * Class RegisterUserUserCaseArgument
 *
 * @package ComAI\Expenses\Application\UseCase\User
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class RegisterUserUserCaseArgument
{

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $password;

    /**
     * RegisterUserUserCaseArgument constructor.
     * @param string $username
     * @param string $email
     * @param string $password
     */
    public function __construct(
        string $username,
        string $email,
        string $password
    ) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function username(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function email(): string
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
