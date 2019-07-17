<?php


namespace ComAI\Expenses\Infrastructure\Factory;

use ComAI\Expenses\Domain\Entity\User;
use ComAI\Expenses\Domain\Exception\EmailInvalidException;
use ComAI\Expenses\Domain\Exception\PasswordInvalidException;
use ComAI\Expenses\Domain\Exception\UsernameCapitalLetterException;
use ComAI\Expenses\Domain\Exception\UsernameWhiteSpaceException;

/**
 * Class UserFactory
 *
 * @package ComAI\Expenses\Infrastructure\Factory
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class UserFactory
{

    /**
     * @var UsernameFactory
     */
    protected $usernameFactory;

    /**
     * @var PasswordFactory
     */
    protected $passwordFactory;

    /**
     * @var EmailFactory
     */
    protected $emailFactory;

    /**
     * UserFactory constructor.
     * @param UsernameFactory $usernameFactory
     * @param PasswordFactory $passwordFactory
     * @param EmailFactory $emailFactory
     */
    public function __construct(
        UsernameFactory $usernameFactory,
        PasswordFactory $passwordFactory,
        EmailFactory $emailFactory
    ) {
        $this->usernameFactory = $usernameFactory;
        $this->passwordFactory = $passwordFactory;
        $this->emailFactory = $emailFactory;
    }

    /**
     * @param int|null $userId
     * @param string $username
     * @param string $password
     * @param string $email
     *
     * @return User
     * @throws EmailInvalidException
     * @throws PasswordInvalidException
     * @throws UsernameCapitalLetterException
     * @throws UsernameWhiteSpaceException
     */
    public function create(
        ?int $userId,
        string $username,
        string $password,
        string $email
    ) : User {
        return new User(
            $userId,
            $this->usernameFactory->create($username),
            $this->emailFactory->create($email),
            $this->passwordFactory->create($password)
        );
    }
}
