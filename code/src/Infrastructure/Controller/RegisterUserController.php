<?php


namespace ComAI\Expenses\Infrastructure\Controller;

use ComAI\Expenses\Application\UseCase\User\RegisterUserUseCase;
use ComAI\Expenses\Application\UseCase\User\RegisterUserUserCaseArgument;
use ComAI\Expenses\Infrastructure\DataTransformer\RegisterUserUseCaseResponseDataTransformer;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class RegisterUserController
 *
 * @package ComAI\Expenses\Infrastructure\Controller
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class RegisterUserController
{

    /**
     * @var RegisterUserUseCase
     */
    protected $registerUserUseCase;

    /**
     * RegisterUserController constructor.
     *
     * @param RegisterUserUseCase $registerUserUseCase
     */
    public function __construct(
        RegisterUserUseCase $registerUserUseCase
    ) {
        $this->registerUserUseCase = $registerUserUseCase;
    }

    /**
     * @param Request $request
     * @param Response $response
     *
     * @return Response
     */
    public function __invoke(Request $request, Response $response)
    {
        $ret = [
            'success' => false
        ];

        if (!$request->isPost()) {
            return $response->withJson($ret, 400);
        }

        $parameters = (array) $request->getParsedBody();

        if (empty($parameters['username'])) {
            return $response->withJson($ret, 400);
        }

        if (empty($parameters['email'])) {
            return $response->withJson($ret, 400);
        }

        if (empty($parameters['password'])) {
            return $response->withJson($ret, 400);
        }

        $useCaseResponse = $this->registerUserUseCase->handle(
            new RegisterUserUserCaseArgument(
                $parameters['username'],
                $parameters['email'],
                $parameters['password']
            )
        );

        $transformer = new RegisterUserUseCaseResponseDataTransformer();

        return $response->withJson(
            $transformer->getResponseAsArray($useCaseResponse),
            $useCaseResponse->httpStatusCode()
        );
    }
}
