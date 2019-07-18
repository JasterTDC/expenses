<?php


namespace ComAI\Expenses\Infrastructure\Factory;

use ComAI\Expenses\Domain\ValueObject\Email;
use ComAI\Expenses\Domain\Exception\EmailInvalidException;

/**
 * Class EmailFactory
 *
 * @package ComAI\Expenses\Infrastructure\Factory
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class EmailFactory
{
    /**
     * @param string $email
     *
     * @return Email
     * @throws EmailInvalidException
     */
    public function create(string $email)
    {
        return Email::create($email);
    }
}
