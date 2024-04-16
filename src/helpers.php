<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use ThemisMin\LaravelApi\LoadResponseCode;

if (!function_exists('response_code')) {
    /**
     * 获取自定义响应码数据
     * @param integer|string $code    响应码
     * @param null           $key     键 默认 null
     * @param null           $defaule 默认值
     * @return mixed|null
     */
    function response_code($code, $key = null, $defaule = null)
    {
        $loadResponseCode = LoadResponseCode::getInstance();

        $code = isset($loadResponseCode[$code]) ? $code : '500';

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
     * 返回 JSON 响应
     * @param string $content 返回内容
     *                        如果是数组，会自动转换为 JSON
     *                        如果是字符串，会直接返回
     *                        如果是 null，会返回空字符串
     * @param int    $code    自定义响应码
     *                        默认 200
     * @param array  $headers 响应头
     *                        默认 []
     * @param int    $options JSON 编码选项
     *                        默认 0
     * @return \Illuminate\Http\JsonResponse
     */
    function response_json($content = '', $code = 200, $headers = [], $options = 0)
    {
        // 获取响应码数据
        $responseCode = response_code($code);

        // 合并数据
        $data = array_merge(
            ['code' => $code],
            Arr::only($responseCode, ['code', 'status', 'message']),
            ['data' => $content]
        );

        // 返回 JSON 响应
        return new JsonResponse($data, Arr::get($responseCode, 'http_code', $code), $headers, $options);
    }
}


