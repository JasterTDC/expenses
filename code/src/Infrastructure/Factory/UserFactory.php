<?php


namespace ComAI\Expenses\Infrastructure\Factory;

use ComAI\Expenses\Domain\Entity\User;
use ComAI\Expenses\Domain\Exception\EmailInvalidException;
use ComAI\Expenses\Domain\Exception\PasswordInvalidException;
use ComAI\Expenses\Domain\Exception\UsernameCapitalLetterException;
use ComAI\Expenses\Domain\Exception\UsernameWhiteSpaceException;
use ComAI\Expenses\Domain\Factory\UserFactoryInterface;

/**
 * Class UserFactoryInterface
 *
 * @package ComAI\Expenses\Infrastructure\Factory
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class UserFactory implements UserFactoryInterface
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
     * UserFactoryInterface constructor.
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
     * @param string $email
     * @param string $password
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
        string $email,
        string $password
    ) : User {
        return new User(
            $userId,
            $this->usernameFactory->create($username),
            $this->emailFactory->create($email),
            $this->passwordFactory->create($password)
        );
    }
}
