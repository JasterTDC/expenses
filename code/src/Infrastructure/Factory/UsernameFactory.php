<?php


namespace ComAI\Expenses\Infrastructure\Factory;

use ComAI\Expenses\Domain\ValueObject\Username;
use ComAI\Expenses\Domain\Exception\UsernameWhiteSpaceException;
use ComAI\Expenses\Domain\Exception\UsernameCapitalLetterException;

/**
 * Class UsernameFactory
 *
 * @package ComAI\Expenses\Infrastructure\Factory
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class UsernameFactory
{

    /**
     * @param string $username
     *
     * @return Username
     * @throws UsernameCapitalLetterException
     * @throws UsernameWhiteSpaceException
     */
    public function create(
        string $username
    ) {
        return Username::create($username);
    }
}
