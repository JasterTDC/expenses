<?php

namespace ComAI\Expenses\Domain\Exception;

use Throwable;

/**
 * EmailInvalidException
 *
 * @author Ismael Moral <jastertdc@gmail.com>
 */
class EmailInvalidException extends \Exception
{
    const MESSAGE = 'The selected email does not have a valid format';
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
