<?php


namespace ComAI\Expenses\Domain\ValueObject;

use ComAI\Expenses\Domain\Exception\PasswordInvalidException;

/**
 * Class Password
 *
 * @package ComAI\Expenses\Domain\ValueObject
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class Password
{

    /**
     * @var string
     */
    protected $password;

    /**
     * Password constructor.
     *
     * @param string $password
     */
    private function __construct(string $password)
    {
        $this->password = $password;
    }

    /**
     * @param string $password
     *
     * @return Password
     * @throws PasswordInvalidException
     */
    public static function create(string $password) : Password
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        if (empty($hash)) {
            throw new PasswordInvalidException();
        }

        return new self($hash);
    }

    /**
     * @param string $password
     *
     * @return Password
     */
    public static function createWithoutPasswordHash(string $password)
    {
        return new self($password);
    }

    /**
     * @return string
     */
    public function password(): string
    {
        return $this->password;
    }
}
