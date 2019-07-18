<?php


namespace ComAI\Expenses\Infrastructure\DataTransformer;

use ComAI\Expenses\Application\UseCase\User\RegisterUserUseCaseResponse;

/**
 * Class RegisterUserUseCaseResponseDataTransformer
 *
 * @package ComAI\Expenses\Infrastructure\DataTransformer
 * @author  Ismael Moral <jastertdc@gmail.com>
 */
class RegisterUserUseCaseResponseDataTransformer
{

    /**
     * @param RegisterUserUseCaseResponse $response
     *
     * @return array
     */
    public function getResponseAsArray(
        RegisterUserUseCaseResponse $response
    ) : array {
        $ret = [];

        $ret['success'] = $response->success();

        if (!empty($response->error())) {
            $ret['error'] = $response->error();
        }

        return $ret;
    }
}
