<?php


namespace ComAI\Expenses\Domain\Exception;

use Throwable;

/**
 * Class UserCookieInvalidDataException
 *
 * @package ComAI\Expenses\Domain\Exception
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class UserCookieInvalidDataException extends \Exception
{
    const MESSAGE = 'We cannot set invalid data in login cookie';
    const CODE = 0;

    /**
     * UserEmptyException constructor.
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
