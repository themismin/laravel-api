<?php

namespace ThemisMin\LaravelApi\Exceptions;

use App\Exceptions\AccessDeniedException;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Mockery\Exception\InvalidOrderException;
use Throwable;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class Handler extends ExceptionHandler
{
    /**
     * 未报告的异常类型列表
     * A list of the exception types that are not reported.
     * @var array
     */
    protected $dontReport = [
        AccessDeniedException::class
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * 为应用程序注册异常处理回调
     * @return void
     */
    public function register()
    {
        parent::register();

        $this->reportable(function (InvalidOrderException $e) {
            try {
                Log::info($e->getMessage());
            } catch (Exception $exception) {
                Log::info($exception->getMessage());
            }
        });

        // 未认证
        $this->renderable(function (AuthenticationException $e) {
            return response_json(
                $this->convertExceptionToArray($e),
                401
            );
        });

        // TOKEN失效
        $this->renderable(function (TokenExpiredException $e) {
            return response_json(
                $this->convertExceptionToArray($e),
                401
            );
        });

        // 表单校验错误
        $this->renderable(function (ValidationException $e) {
            $message = $e->getMessage();
            $errors = $e->errors();
            if (count($errors) > 0) {
                $error = array_shift($errors);
                $message = $error[0];
            }
            return response_json([
                'message' => $message,
                'errors'  => $e->errors(),
            ], $e->status);
        });

        // 其他异常
        $this->renderable(function (Throwable $e) {
            return response_json(
                $this->convertExceptionToArray($e, "系统错误"),
                500
            );
        });
    }

    /**
     * Convert an authentication exception into a response.
     * @param \Illuminate\Http\Request                 $request
     * @param \Illuminate\Auth\AuthenticationException $exception
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return $request->expectsJson()
            ? response_json(['message' => $exception->getMessage()], 401)
            : redirect()->guest($exception->redirectTo() ?? route('login'));
    }

    /**
     * Convert a validation exception into a JSON response.
     * @param \Illuminate\Http\Request                   $request
     * @param \Illuminate\Validation\ValidationException $exception
     * @return \Illuminate\Http\JsonResponse
     */
    protected function invalidJson($request, ValidationException $exception)
    {
        return response_json([
            'message' => $exception->getMessage(),
            'errors'  => $exception->errors(),
        ], $exception->status);
    }

    /**
     * Prepare a JSON response for the given exception.
     * @param \Illuminate\Http\Request $request
     * @param Throwable                $e
     * @return \Illuminate\Http\JsonResponse
     */
    protected function prepareJsonResponse($request, Throwable $e)
    {
        return response_json(
            $this->convertExceptionToArray($e),
            $this->isHttpException($e) ? $e->getStatusCode() : 500
        );
    }

    /**
     * 将异常转换为数组
     * Convert the given exception to an array
     * @param \Throwable  $e
     * @param string|null $errorMessage
     * @return array|string[]
     */
    protected function convertExceptionToArray(Throwable $e, ?string $errorMessage = null): array
    {
        return config('app.debug') ? [
            'message'   => $e->getMessage(),
            'exception' => get_class($e),
            'file'      => $e->getFile(),
            'line'      => $e->getLine(),
            'trace'     => collect($e->getTrace())->map(function ($trace) {
                return Arr::except($trace, ['args']);
            })->all(),
        ] : [
            'message' => $errorMessage ?: $e->getMessage(),
        ];
    }
}
