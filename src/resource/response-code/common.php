<?php
/** code common */
return [
    /**
     * 自定义码
     *      HTTP 响应状态码 默认200
     *      code 默认等于自定义码
     *      状态 success | error
     *      响应消息 ""
     */

    // 这个临时响应是用来通知客户端它的部分请求已经被服务器接收，且仍未被拒绝。客户端应当继续发送请求的剩余部分，或者如果请求已经完成，忽略这个响应。
    '100' => ['http_code' => 200, 'code' => 100, 'status' => 'error', 'message' => 'Continue',],
    // 换协议。服务器根据客户端的请求切换协议。只能切换到更高级的协议，例如，切换到HTTP的新版本协议。
    '101' => ['http_code' => 200, 'code' => 101, 'status' => 'error', 'message' => 'Switching Protocols',],
    // 由WebDAV（RFC 2518）扩展的状态码，代表处理将被继续执行。
    '102' => ['http_code' => 200, 'code' => 102, 'status' => 'error', 'message' => 'Processing',],
    // 请求成功。一般用于GET与POST请求，出现此状态码是表示正常状态。
    '200' => ['http_code' => 200, 'code' => 200, 'status' => 'success', 'message' => 'OK',],
    // 已创建。成功请求并创建了新的资源
    '201' => ['http_code' => 200, 'code' => 201, 'status' => 'success', 'message' => 'Created',],
    // 已接受。已经接受请求，但未处理完成
    '202' => ['http_code' => 200, 'code' => 202, 'status' => 'success', 'message' => 'Accepted',],
    // 服务器已成功处理了请求，但返回的实体头部元信息不是在原始服务器上有效的确定集合，而是来自本地或者第三方的拷贝。当前的信息可能是原始版本的子集或者超集。
    '203' => ['http_code' => 200, 'code' => 203, 'status' => 'success', 'message' => 'Non-Authoritative Information',],
    // 无内容。服务器成功处理，但未返回内容。在未更新网页的情况下，可确保浏览器继续显示当前文档
    '204' => ['http_code' => 200, 'code' => 204, 'status' => 'success', 'message' => 'No Content',],
    // 重置内容。服务器处理成功，用户终端（例如：浏览器）应重置文档视图。可通过此返回码清除浏览器的表单域，以便用户能够轻松地开始另一次输入。
    '205' => ['http_code' => 200, 'code' => 205, 'status' => 'success', 'message' => 'Reset Content',],
    // 部分内容。服务器成功处理了部分GET请求，类似于迅雷这类的 HTTP下载工具是使用此类响应实现断点续传或者将一个大文档分解为多个下载段同时下载。
    '206' => ['http_code' => 200, 'code' => 206, 'status' => 'success', 'message' => 'Partial Content',],
    // 多种选择。请求的资源可包括多个位置，相应可返回一个资源特征与地址的列表用于用户终端（例如：浏览器）选择。
    '300' => ['http_code' => 200, 'code' => 300, 'status' => 'error', 'message' => 'Multiple Choices',],
    // 永久移动。请求的资源已被永久的移动到新URI，返回信息会包括新的URI，浏览器会自动定向到新URI。今后任何新的请求都应使用新的URI代替。
    '301' => ['http_code' => 200, 'code' => 301, 'status' => 'error', 'message' => 'Moved Permanently',],
    // 临时移动。与301类似。但资源只是临时被移动。客户端应继续使用原有
    '302' => ['http_code' => 200, 'code' => 302, 'status' => 'error', 'message' => 'Found',],
    // 查看其它地址。对应当前请求的响应可以在另一个 URI 上被找到，而且客户端应当采用 GET 的方式访问那个资源。这个方法的存在主要是为了允许由脚本激活的POST请求输出重定向到一个新的资源。这个新的 URI 不是原始资源的替代引用。
    '303' => ['http_code' => 200, 'code' => 303, 'status' => 'error', 'message' => 'See Other',],
    // 未修改。所请求的资源未修改，服务器返回此状态码时，不会返回任何资源。客户端通常会缓存访问过的资源，通过提供一个头信息指出客户端希望只返回在指定日期之后修改的资源。
    '304' => ['http_code' => 200, 'code' => 304, 'status' => 'error', 'message' => 'Not Modified',],
    // 使用代理。所请求的资源必须通过代理访问。
    '305' => ['http_code' => 200, 'code' => 305, 'status' => 'error', 'message' => 'Use Proxy',],
    // 在最新版的规范中，306状态码已经不再被使用。
    '306' => ['http_code' => 200, 'code' => 306, 'status' => 'error', 'message' => 'Switch Proxy',],
    // 临时重定向。与302类似。使用GET请求重定向。
    '307' => ['http_code' => 200, 'code' => 307, 'status' => 'error', 'message' => 'Temporary Redirect',],
    // 客户端请求的语法错误，服务器无法理解，请求参数有误。
    '400' => ['http_code' => 200, 'code' => 400, 'status' => 'error', 'message' => 'Bad Request',],
    // 请求要求用户的身份认证
    '401' => ['http_code' => 200, 'code' => 401, 'status' => 'error', 'message' => 'Unauthorized',],
    // 该状态码是为了将来可能的需求而预留的。
    '402' => ['http_code' => 200, 'code' => 402, 'status' => 'error', 'message' => 'Payment Required',],
    // 服务器理解请求客户端的请求，但是拒绝执行此请求
    '403' => ['http_code' => 200, 'code' => 403, 'status' => 'error', 'message' => 'Forbidden',],
    // 服务器无法根据客户端的请求找到资源（网页）。通过此代码，网站设计人员可设置”您所请求的资源无法找到”的个性页面
    '404' => ['http_code' => 200, 'code' => 404, 'status' => 'error', 'message' => 'Not Found',],
    // 客户端请求中的方法被禁止
    '405' => ['http_code' => 200, 'code' => 405, 'status' => 'error', 'message' => 'Method Not Allowed',],
    // 请求的资源的内容特性无法满足请求头中的条件，因而无法生成响应实体
    '406' => ['http_code' => 200, 'code' => 406, 'status' => 'error', 'message' => 'Not Acceptable',],
    // 请求要求代理的身份认证，与401类似，但请求者应当使用代理进行授权
    '407' => ['http_code' => 200, 'code' => 407, 'status' => 'error', 'message' => 'Proxy Authentication Required',],
    // 服务器等待客户端发送的请求时间过长，超时
    '408' => ['http_code' => 200, 'code' => 408, 'status' => 'error', 'message' => 'Request Time-out',],
    // 服务器完成客户端的PUT请求是可能返回此代码，服务器处理请求时发生了冲突
    '409' => ['http_code' => 200, 'code' => 409, 'status' => 'error', 'message' => 'Conflict',],
    // 客户端请求的资源已经不存在。410不同于404，如果资源以前有现在被永久删除了可使用410代码，网站设计人员可通过301代码指定资源的新位置
    '410' => ['http_code' => 200, 'code' => 410, 'status' => 'error', 'message' => 'Gone',],
    // 服务器无法处理客户端发送的不带Content-Length的请求信息
    '411' => ['http_code' => 200, 'code' => 411, 'status' => 'error', 'message' => 'Length Required',],
    // 服务器在验证在请求的头字段中给出先决条件时，先决条件错误
    '412' => ['http_code' => 200, 'code' => 412, 'status' => 'error', 'message' => 'Precondition Failed',],
    // 由于请求的实体过大，服务器无法处理，因此拒绝请求。为防止客户端的连续请求，服务器可能会关闭连接。如果只是服务器暂时无法处理，则会包含一个Retry-After的响应信息
    '413' => ['http_code' => 200, 'code' => 413, 'status' => 'error', 'message' => 'Request Entity Too Large',],
    // 请求的URI过长（URI通常为网址），服务器无法处理
    '414' => ['http_code' => 200, 'code' => 414, 'status' => 'error', 'message' => 'Request-URI Too Large',],
    // 服务器无法处理请求附带的媒体格式
    '415' => ['http_code' => 200, 'code' => 415, 'status' => 'error', 'message' => 'Unsupported Media Type',],
    // 客户端请求的范围无效
    '416' => ['http_code' => 200, 'code' => 416, 'status' => 'error', 'message' => 'Requested range not satisfiable',],
    // 服务器无法满足Expect的请求头信息
    '417' => ['http_code' => 200, 'code' => 417, 'status' => 'error', 'message' => 'Expectation Failed',],
    // 从当前客户端所在的IP地址到服务器的连接数超过了服务器许可的最大范围。
    '421' => ['http_code' => 200, 'code' => 421, 'status' => 'error', 'message' => 'too many connections',],
    // 请求格式正确，但是由于含有语义错误，无法响应。
    '422' => ['http_code' => 200, 'code' => 422, 'status' => 'error', 'message' => 'Unprocessable Entity',],
    // 当前资源被锁定。
    '423' => ['http_code' => 200, 'code' => 423, 'status' => 'error', 'message' => 'Locked',],
    // 由于之前的某个请求发生的错误，导致当前请求失败，例如 PROPPATCH。
    '424' => ['http_code' => 200, 'code' => 424, 'status' => 'error', 'message' => 'Failed Dependency',],
    // 服务器内部错误，无法完成请求
    '500' => ['http_code' => 200, 'code' => 500, 'status' => 'error', 'message' => 'Internal Server Error',],
    // 服务器不支持请求的功能，无法完成请求
    '501' => ['http_code' => 200, 'code' => 501, 'status' => 'error', 'message' => 'Not Implemented',],
    // 充当网关或代理的服务器，从远端服务器接收到了一个无效的请求
    '502' => ['http_code' => 200, 'code' => 502, 'status' => 'error', 'message' => 'Bad Gateway',],
    // 由于超载或系统维护，服务器暂时的无法处理客户端的请求。延时的长度可包含在服务器的Retry-After头信息中
    '503' => ['http_code' => 200, 'code' => 503, 'status' => 'error', 'message' => 'Service Unavailable',],
    // 充当网关或代理的服务器，未及时从远端服务器获取请求
    '504' => ['http_code' => 200, 'code' => 504, 'status' => 'error', 'message' => 'Gateway Time-out',],
    // 服务器不支持请求的HTTP协议的版本，无法完成处理。这暗示着服务器不能或不愿使用与客户端相同的版本。响应中应当包含一个描述了为何版本不被支持以及服务器支持哪些协议的实体。
    '505' => ['http_code' => 200, 'code' => 505, 'status' => 'error', 'message' => 'HTTP Version not supported',],
    // 源站没有返回响应头部，只返回实体内容
    '600' => ['http_code' => 200, 'code' => 600, 'status' => 'error', 'message' => 'Unparseable Response Headers',],
];
