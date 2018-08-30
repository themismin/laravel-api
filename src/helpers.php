<?php

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use ThemisMin\LaravelApi\LoadResponseCode;

if (!function_exists('response_code')) {

    /**
     * 根据 code &| key 获取 response_code 值
     * @param $code 200
     * @param $key 'status_code' | 'message'
     * @param null $defaule
     */
    function response_code($code, $key = null, $defaule = null)
    {
        $loadResponseCode = LoadResponseCode::getInstance();

        if (null === $key) {
            return $loadResponseCode[$code];
        } else {
            if (isset($loadResponseCode[$code][$key])) {
                return $loadResponseCode[$code][$key];
            } else {
                return $defaule;
            }
        }
    }
}

if (!function_exists('response_json')) {

    /**
     * 返回 api 响应 json
     * @param string $content
     * @param int $code
     * @return JsonResponse
     */
    function response_json($content = '', $code = 200)
    {
        $jsonResponse = new JsonResponse($content);
        return $jsonResponse->apiJson($code);
    }
}


