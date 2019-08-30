<?php
/** code common */
return [
    /** 自定义码 => HTTP 响应状态码, 预留, 响应消息 */


    /** 未认证 */
    '401' => ['http_code' => 401, 'status' => 'error', 'message' => 'Unauthenticated.',],
    /** 参数错误 */
    '422' => ['http_code' => 422, 'status' => 'error', 'message' => 'The given data was invalid.',],
    /** 服务器错误 */
    '500' => ['http_code' => 500, 'status' => 'error', 'message' => 'Internal Server Error.',],


    /** 成功  */
    '200' => ['http_code' => 200, 'status' => 'success', 'message' => '成功',],

];