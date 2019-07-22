<?php


namespace ComAI\Expenses\Infrastructure\DataTransformer;

use ComAI\Expenses\Domain\Entity\User;

/**
 * Class UserTransformer
 *
 * @package ComAI\Expenses\Infrastructure\DataTransformer
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class UserTransformer
{

    /**
     * @param User $user
     *
     * @return array
     */
    public function getUserAsArray(
        User $user
    ) : array {
        return [
            'id' => $user->id(),
            'username' => $user->username(),
            'email' => $user->email()
        ];
    }
}
