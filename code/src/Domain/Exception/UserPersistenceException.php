<?php


namespace ComAI\Expenses\Domain\Exception;

use Throwable;

/**
 * Class UserPersistenceException
 *
 * @package ComAI\Expenses\Domain\Exception
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class UserPersistenceException extends \Exception
{
    const MESSAGE = 'We cannot persist the selected user';
    const CODE = 0;

    /**
     * UserPersistenceException constructor.
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
