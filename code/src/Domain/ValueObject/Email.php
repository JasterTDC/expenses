<?php

namespace ComAI\Expenses\Domain\ValueObject;

use ComAI\Expenses\Domain\Exception\EmailInvalidException;

/**
 * Email
 *
 * @author Ismael Moral <jastertdc@gmail.com>
 */
class Email
{
    /**
     * @var string
     */
    protected $email;

    /**
     * Email
     *
     * @param string $email
     */
    private function __construct(string $email)
    {
        $this->email = $email;
    }

    /**
     * @param string $email
     *
     * @return Email
     * @throws EmailInvalidException
     */
    public static function create(string $email) : Email
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new EmailInvalidException();
        }

        return new self($email);
    }

    /**
     * Get email
     *
     * @return string
     */
    public function email() : string
    {
        return $this->email;
    }
}
