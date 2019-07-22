<?php


namespace ComAI\Expenses\Domain\Exception;

use Throwable;

/**
 * Class UserEmptyException
 *
 * @package ComAI\Expenses\Domain\Exception
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class UserEmptyException extends \Exception
{
    const MESSAGE = 'The selected user does not exist';
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
