<?php


namespace ComAI\Expenses\Infrastructure\Controller\User;

use ComAI\Expenses\Domain\ValueObject\UserLoginCookie;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class LogoutController
 *
 * @package ComAI\Expenses\Infrastructure\Controller\User
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class LogoutController
{

    /**
     * LogoutController constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param Request $request
     * @param Response $response
     *
     * @return Response
     */
    public function __invoke(
        Request $request,
        Response $response
    ) : Response {
        if (isset($_COOKIE[UserLoginCookie::LOGIN_COOKIE])) {
            unset($_COOKIE[UserLoginCookie::LOGIN_COOKIE]);

            setcookie(
                UserLoginCookie::LOGIN_COOKIE,
                '',
                -1,
                '/'
            );
        }

        return $response->withJson([
            'success' => true
        ]);
    }
}
