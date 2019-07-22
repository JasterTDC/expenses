<?php


namespace ComAI\Expenses\Domain\Repository;

use ComAI\Expenses\Domain\Entity\User;
use ComAI\Expenses\Domain\Exception\UserEmptyException;

/**
 * Interface UserReader
 *
 * @package ComAI\Expenses\Domain\Repository
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
interface UserReader
{

    /**
     * @param string $username
     *
     * @throws UserEmptyException
     * @return User
     */
    public function getByUsername(
        string $username
    ) : User;

    /**
     * @param string $email
     *
     * @throws UserEmptyException
     * @return User
     */
    public function getByEmail(
        string $email
    ) : User;
}
