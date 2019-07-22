<?php


namespace ComAI\Expenses\Infrastructure\Factory;

use ComAI\Expenses\Domain\ValueObject\Password;
use ComAI\Expenses\Domain\Exception\PasswordInvalidException;

/**
 * Class PasswordFactory
 *
 * @package ComAI\Expenses\Infrastructure\Factory
 */
class PasswordFactory
{

    /**
     * @param string $password
     *
     * @return Password
     * @throws PasswordInvalidException
     */
    public function create(string $password)
    {
        return Password::create($password);
    }

    /**
     * @param string $password
     *
     * @return Password
     */
    public function createWithoutPasswordHash(string $password)
    {
        return Password::createWithoutPasswordHash($password);
    }
}
