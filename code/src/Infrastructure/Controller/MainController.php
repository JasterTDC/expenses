<?php

namespace ComAI\Expenses\Infrastructure\Controller;

use ComAI\Expenses\Infrastructure\Repository\ExpenseReadRepository;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * MainController
 * 
 * @author Ismael Moral <jastertdc@email.com>
 */
class MainController
{

    /**
     * MainController
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function __invoke(Request $request, Response $response) : Response
    {
        return $response->withJson([
            'success' => true
        ]);
    }
    
}