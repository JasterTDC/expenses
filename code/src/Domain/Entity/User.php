<?php

namespace ComAI\Expenses\Domain\Entity;

use ComAI\Expenses\Domain\ValueObject\Email;
use ComAI\Expenses\Domain\ValueObject\Password;
use ComAI\Expenses\Domain\ValueObject\Username;

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
     * @var Username
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
     * @param Username $username
     * @param Email $email
     * @param Password $password
     */
    public function __construct(
        int $id,
        Username $username,
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
     * @return Username
     */
    public function username(): Username
    {
        return $this->username;
    }

    /**
     * @param Username $username
     */
    public function setUsername(Username $username): void
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
