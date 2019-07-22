<?php


namespace ComAI\Expenses\Infrastructure\Controller;

use ComAI\Expenses\Application\UseCase\User\LoginUserUseCase;
use ComAI\Expenses\Application\UseCase\User\LoginUserUseCaseArgument;
use ComAI\Expenses\Domain\Exception\UserCookieInvalidDataException;
use ComAI\Expenses\Domain\ValueObject\UserLoginCookie;
use ComAI\Expenses\Infrastructure\DataTransformer\LoginUserUseCaseResponseDataTransformer;
use ComAI\Expenses\Infrastructure\DataTransformer\UserTransformer;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class LoginUserController
 *
 * @package ComAI\Expenses\Infrastructure\Controller
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class LoginUserController
{
    /**
     * @var LoginUserUseCase
     */
    protected $useCase;

    /**
     * LoginUserController constructor.
     *
     * @param LoginUserUseCase $useCase
     */
    public function __construct(
        LoginUserUseCase $useCase
    ) {
        $this->useCase = $useCase;
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
        $ret = [
            'success'   => false
        ];
        $parameters = (array) $request->getParsedBody();

        if (empty($parameters['password'])) {
            return $response->withJson($ret, 400);
        }

        $arguments = new LoginUserUseCaseArgument(
            (!empty($parameters['username']) ? $parameters['username'] : null),
            (!empty($parameters['email']) ? $parameters['email'] : null),
            $parameters['password']
        );

        $useCaseResponse = $this->useCase->handle($arguments);

        if (!empty($useCaseResponse->user())) {
            $userTransformer = new UserTransformer();

            try {
                $userLogin = UserLoginCookie::createUsingDecoded(
                    $userTransformer->getUserAsArray(
                        $useCaseResponse->user()
                    )
                );

                setcookie(
                    UserLoginCookie::LOGIN_COOKIE,
                    $userLogin->encodedData(),
                    time() + UserLoginCookie::LOGIN_COOKIE_TIME,
                    '/'
                );
            } catch (UserCookieInvalidDataException $e) {
                return $response->withJson([
                    'success' => false
                ]);
            }

            return $response->withJson([
               'success' => true
            ]);
        }

        $transformer = new LoginUserUseCaseResponseDataTransformer();

        return $response->withJson(
            $transformer->getResponseAsArray($useCaseResponse),
            $useCaseResponse->httpStatusCode()
        );
    }
}
