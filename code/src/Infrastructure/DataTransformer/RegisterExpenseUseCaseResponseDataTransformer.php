<?php


namespace ComAI\Expenses\Infrastructure\DataTransformer;

use ComAI\Expenses\Application\UseCase\Expense\RegisterExpenseUseCaseResponse;

/**
 * Class RegisterExpenseUseCaseResponseDataTransformer
 *
 * @package ComAI\Expenses\Infrastructure\DataTransformer
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class RegisterExpenseUseCaseResponseDataTransformer
{
    /**
     * @param RegisterExpenseUseCaseResponse $response
     *
     * @return array
     */
    public function getResponseAsArray(
        RegisterExpenseUseCaseResponse $response
    ) : array {
        $ret = [];

        $ret['success'] = $response->success();

        if (!empty($response->error())) {
            $ret['error'] = $response->error();
        }

        if (!empty($response->expense())) {
            $ret['expenseId'] = $response->expense()->id();
        }

        return $ret;
    }
}
