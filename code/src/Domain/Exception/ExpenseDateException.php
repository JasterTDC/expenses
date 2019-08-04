<?php

namespace ComAI\Expenses\Domain\Exception;

use Throwable;

/**
 * EmailInvalidException
 *
 * @author Ismael Moral <jastertdc@gmail.com>
 */
class ExpenseDateException extends \Exception
{
    const MESSAGE = 'Expense date is malformed';
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
