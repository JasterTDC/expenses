<?php


namespace ComAI\Expenses\Domain\Exception;

use Throwable;

/**
 * Class UsernameWhiteSpaceException
 *
 * @package ComAI\Expenses\Domain\Exception
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class UsernameWhiteSpaceException extends \Exception
{

    const MESSAGE = 'Whitespace is not allowed in username';
    const CODE = 0;

    /**
     * UsernameWhiteSpaceException constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(
            self::MESSAGE,
            self::CODE,
            $previous
        );
    }
}
