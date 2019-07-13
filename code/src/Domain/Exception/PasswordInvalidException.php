<?php


namespace ComAI\Expenses\Domain\Exception;

use Throwable;

/**
 * Class PasswordInvalidException
 *
 * @package ComAI\Expenses\Domain\Exception
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class PasswordInvalidException extends \Exception
{

    const MESSAGE = 'The selected password is not valid';
    const CODE = 0;

    /**
     * PasswordInvalidException constructor.
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
