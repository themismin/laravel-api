# laravel-api

Laravel api 接口扩展包

### 安装

```bash
composer require themismin/laravel-api

php artisan vendor:publish --provider="ThemisMin\LaravelApi\LaravelApiServiceProvider"
```

### 配置
> 在状态资源文件 resource/response-code/*.php 配置响应code
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

];
```

### 使用
```php
return response_json(['id' => "1"]);
 
> {"code":200,"status":"success","message":"success","data":{"id":"1"}}
```

```php
return response_json(['id' => '1'], 401);
 
> {"code":401,"status":"error","message":"Unauthenticated.","data":{"id":"1"}}
```