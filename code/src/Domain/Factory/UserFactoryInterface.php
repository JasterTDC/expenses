<?php


namespace ComAI\Expenses\Domain\Factory;

use ComAI\Expenses\Domain\Entity\User;
use ComAI\Expenses\Domain\Exception\EmailInvalidException;
use ComAI\Expenses\Domain\Exception\UsernameCapitalLetterException;
use ComAI\Expenses\Domain\Exception\UsernameWhiteSpaceException;

/**
 * Interface UserFactoryInterface
 *
 * @package ComAI\Expenses\Domain\Factory
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
interface UserFactoryInterface
{

    /**
     * @param int|null $userId
     * @param string $username
     * @param string $email
     * @param string $password
     *
     * @return User
     */
    public function create(
        ?int $userId,
        string $username,
        string $email,
        string $password
    ) : User;

    /**
     * @param int|null $userId
     * @param string $username
     * @param string $email
     * @param string $password
     *
     * @return User
     * @throws EmailInvalidException
     * @throws UsernameCapitalLetterException
     * @throws UsernameWhiteSpaceException
     */
    public function createWithoutPasswordHash(
        ?int $userId,
        string $username,
        string $email,
        string $password
    ) : User;
}
