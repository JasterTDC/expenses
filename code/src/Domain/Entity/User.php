<?php

namespace ComAI\Expenses\Domain\Entity;

use ComAI\Expenses\Domain\ValueObject\Email;
use ComAI\Expenses\Domain\ValueObject\Password;

/**
 * User
 *
 * @author Ismael Moral <jastertdc@gmail.com>
 */
class User
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var Email
     */
    protected $email;

    /**
     * @var Password
     */
    protected $password;

    /**
     * User constructor.
     *
     * @param int $id
     * @param string $username
     * @param Email $email
     * @param Password $password
     */
    public function __construct(
        int $id,
        string $username,
        Email $email,
        Password $password
    ) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function username(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return Email
     */
    public function email(): Email
    {
        return $this->email;
    }

    /**
     * @param Email $email
     */
    public function setEmail(Email $email): void
    {
        $this->email = $email;
    }

    /**
     * @return Password
     */
    public function password(): Password
    {
        return $this->password;
    }

    /**
     * @param Password $password
     */
    public function setPassword(Password $password): void
    {
        $this->password = $password;
    }
}
