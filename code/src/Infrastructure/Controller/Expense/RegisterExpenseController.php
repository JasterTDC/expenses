<?php


namespace ComAI\Expenses\Infrastructure\Controller\Expense;

use ComAI\Expenses\Application\UseCase\Expense\RegisterExpenseUseCase;
use ComAI\Expenses\Application\UseCase\Expense\RegisterExpenseUseCaseArguments;
use ComAI\Expenses\Infrastructure\DataTransformer\RegisterExpenseUseCaseResponseDataTransformer;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class RegisterExpenseController
 *
 * @package ComAI\Expenses\Infrastructure\Controller\Expense
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class RegisterExpenseController
{
    /**
     * @var RegisterExpenseUseCase
     */
    protected $useCase;

    /**
     * RegisterExpenseController constructor.
     *
     * @param RegisterExpenseUseCase $useCase
     */
    public function __construct(
        RegisterExpenseUseCase $useCase
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

        if (empty($parameters['name'])) {
            return $response->withJson($ret, 400);
        }

        if (empty($parameters['price'])) {
            return $response->withJson($ret, 400);
        }

        if (empty($parameters['date'])) {
            return $response->withJson($ret, 400);
        }

        $argument = new RegisterExpenseUseCaseArguments(
            $parameters['name'],
            $parameters['price'],
            $parameters['date']
        );

        $useCaseResponse = $this->useCase->handle($argument);

        $transformer = new RegisterExpenseUseCaseResponseDataTransformer();

        return $response->withJson(
            $transformer->getResponseAsArray($useCaseResponse),
            $useCaseResponse->httpStatusCode()
        );
    }
}
