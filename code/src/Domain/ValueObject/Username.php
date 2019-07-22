<?php


namespace ComAI\Expenses\Domain\ValueObject;

use ComAI\Expenses\Domain\Exception\UsernameCapitalLetterException;
use ComAI\Expenses\Domain\Exception\UsernameWhiteSpaceException;

/**
 * Class Username
 *
 * @package ComAI\Expenses\Domain\ValueObject
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class Username
{

    /**
     * @var string
     */
    protected $username;

    /**
     * Username constructor.
     *
     * @param string $username
     */
    private function __construct(string $username)
    {
        $this->username = $username;
    }

    /**
     * @param string $username
     *
     * @return Username
     * @throws UsernameCapitalLetterException
     * @throws UsernameWhiteSpaceException
     */
    public static function create(string $username) : Username
    {
        if (preg_match('/(\s+)/', $username)) {
            throw new UsernameWhiteSpaceException();
        }

        if (preg_match('/([A-Z])+/', $username)) {
            throw new UsernameCapitalLetterException();
        }

        return new self($username);
    }

    /**
     * @return string
     */
    public function username(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }
}
