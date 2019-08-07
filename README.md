# laravel-api

Laravel api 接口扩展包

### 安装

```bash
composer require themismin/laravel-api

php artisan vendor:publish --provider="ThemisMin\LaravelApi\LaravelApiServiceProvider"
```

### 配置
> 在状态资源文件 resource/response-code/*.php 配置响应code

> 1.0.* 版本
```php
/** response code common */
return [
    /** 自定义码 => HTTP 响应状态码, 预留, 响应消息 */
    
    /** 未认证 */
    '401' => ['status_code' => 401, 'status' => 'error', 'message' => 'Unauthenticated.',],
    /** 参数错误 */
    '422' => ['status_code' => 422, 'status' => 'error', 'message' => 'The given data was invalid.',],
    
    /** 成功  */
    '200' => ['status_code' => 200, 'status' => 'success', 'message' => '成功',],
    
    /** http_code 200, 接口 code 200401 */
    '200401' => ['status_code' => 200, 'status' => 'success', 'message' => '成功',],
];
```

> 1.1.* 版本
```php
/** response code common */
return [
    /** 自定义码 => HTTP 响应状态码, 预留, 响应消息 */
    
    /** 未认证 */
    '401' => ['http_code' => 401, 'status' => 'error', 'message' => 'Unauthenticated.',],
    /** 参数错误 */
    '422' => ['http_code' => 422, 'status' => 'error', 'message' => 'The given data was invalid.',],
    
    /** 成功  */
    '200' => ['http_code' => 200, 'status' => 'success', 'message' => '成功',],
    
    /** 当 http_code 未设置时，默认为 200 */
    '200' => ['status' => 'success', 'message' => '成功',],
    
    /** http_code 200, 接口 code 200401 */
    '200401' => ['http_code' => 200, 'status' => 'success', 'message' => '成功',],
    /** 或 */
    '200401' => ['status' => 'success', 'message' => '成功',],

];
```
### 使用
```php
return response_json(['id' => "1"]);
 
> http_code:200 {"code":200,"status":"success","message":"success","data":{"id":"1"}}
```

```php
return response_json(['id' => '1'], 401);
 
> http_code:401 {"code":401,"status":"error","message":"Unauthenticated.","data":{"id":"1"}}
```

```php
return response_json(['id' => '1'], 200401);
 
> http_code:200 {"code":200401,"status":"error","message":"Unauthenticated.","data":{"id":"1"}}
```