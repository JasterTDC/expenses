<?php


namespace ComAI\Expenses\Domain\ValueObject;

use ComAI\Expenses\Domain\Exception\UserCookieInvalidDataException;

/**
 * Class UserLoginCookie
 *
 * @package ComAI\Expenses\Domain\ValueObject
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class UserLoginCookie
{
    const LOGIN_COOKIE = 'expenses_session';
    const LOGIN_COOKIE_TIME = 60*60*24;

    /**
     * @var string
     */
    protected $encodedData;

    /**
     * @var array
     */
    protected $decodedData;

    /**
     * UserLoginCookie constructor.
     *
     * @param string $encodedData
     * @param array $decodedData
     */
    public function __construct(
        string $encodedData,
        array $decodedData
    ) {
        $this->encodedData = $encodedData;
        $this->decodedData = $decodedData;
    }

    /**
     * @param array $data
     *
     * @return UserLoginCookie
     * @throws UserCookieInvalidDataException
     */
    public static function createUsingDecoded(array $data)
    {
        $encode = json_encode($data);

        if (!empty($encode)) {
            return new self(
                base64_encode($encode),
                $data
            );
        }

        throw new UserCookieInvalidDataException();
    }

    /**
     * @param string $data
     *
     * @return UserLoginCookie
     * @throws UserCookieInvalidDataException
     */
    public static function createUsingEncoded(string $data)
    {
        $decode = base64_decode($data);

        if (!empty($decode)) {
            return new self(
                $data,
                json_decode($decode, true)
            );
        }

        throw new UserCookieInvalidDataException();
    }

    /**
     * @return string
     */
    public function encodedData(): string
    {
        return $this->encodedData;
    }

    /**
     * @return array
     */
    public function decodedData(): array
    {
        return $this->decodedData;
    }
}
