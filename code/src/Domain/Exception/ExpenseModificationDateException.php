<?php

namespace ComAI\Expenses\Domain\Exception;

use Throwable;

/**
 * EmailInvalidException
 *
 * @author Ismael Moral <jastertdc@gmail.com>
 */
class ExpenseModificationDateException extends \Exception
{
    const MESSAGE = 'Expense modification date is malformed';
    const CODE = 0;

    /**
     * EmailInvalidException constructor
     *
     * @param Throwable $e
     */
    public function __construct(Throwable $e = null)
    {
        parent::__construct(
            self::MESSAGE,
            self::CODE,
            $e
        );
    }
}
