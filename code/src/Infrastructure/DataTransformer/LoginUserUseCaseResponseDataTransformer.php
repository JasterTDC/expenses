<?php


namespace ComAI\Expenses\Infrastructure\DataTransformer;

use ComAI\Expenses\Application\UseCase\User\LoginUserUseCaseResponse;

/**
 * Class LoginUserUseCaseResponseDataTransformer
 *
 * @package ComAI\Expenses\Infrastructure\DataTransformer
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class LoginUserUseCaseResponseDataTransformer
{
    public function getResponseAsArray(
        LoginUserUseCaseResponse $response
    ) : array {
        $ret = [];

        $ret['success'] = $response->success();

        if (!empty($response->error())) {
            $ret['error'] = $response->error();
        }

        return $ret;
    }
}
