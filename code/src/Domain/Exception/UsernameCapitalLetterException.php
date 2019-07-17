<?php


namespace ComAI\Expenses\Domain\Exception;

use Throwable;

/**
 * Class UsernameCapitalLetterException
 *
 * @package ComAI\Expenses\Domain\Exception
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class UsernameCapitalLetterException extends \Exception
{

    const MESSAGE = 'Capital letters is not allowed in username';
    const CODE = 0;

    /**
     * UsernameCapitalLetterException constructor.
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
