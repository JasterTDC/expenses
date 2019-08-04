<?php


namespace ComAI\Expenses\Domain\Exception;

use Throwable;

/**
 * Class ExpensePersistenceException
 *
 * @package ComAI\Expenses\Domain\Exception
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class ExpensePersistenceException extends \Exception
{
    const MESSAGE = 'We cannot persist the selected expense';
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
