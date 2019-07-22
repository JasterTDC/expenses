<?php


namespace ComAI\Expenses\Domain\Repository;

use ComAI\Expenses\Domain\Entity\User;

/**
 * Interface UserWriter
 *
 * @package ComAI\Expenses\Domain\Repository
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
interface UserWriter
{

    /**
     * @param User $user
     *
     * @return User
     */
    public function persist(User $user) : User;
}
