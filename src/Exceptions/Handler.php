<?php

namespace ThemisMin\LaravelApi\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into a response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Auth\AuthenticationException $exception
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return $request->expectsJson()
            ? response_json($exception->getMessage(), 401)
            : redirect()->guest($exception->redirectTo() ?? route('login'));
        // return $request->expectsJson()
        //     ? response()->json(['message' => $exception->getMessage()], 401)
        //     : redirect()->guest($exception->redirectTo() ?? route('login'));
    }

    /**
     * Convert a validation exception into a JSON response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Validation\ValidationException $exception
     * @return \Illuminate\Http\JsonResponse
     */
    protected function invalidJson($request, ValidationException $exception)
    {
        return response_json($exception->errors(), $exception->status);
        // return response()->json([
        //     'message' => $exception->getMessage(),
        //     'errors' => $exception->errors(),
        // ], $exception->status);
    }

    /**
     * Prepare a JSON response for the given exception.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception $e
     * @return \Illuminate\Http\JsonResponse
     */
    protected function prepareJsonResponse($request, Exception $e)
    {
        return response_json($e->getMessage(), ($this->isHttpException($e) ? $e->getStatusCode() : 500));
        // return new JsonResponse(
        //     $this->convertExceptionToArray($e),
        //     $this->isHttpException($e) ? $e->getStatusCode() : 500,
        //     $this->isHttpException($e) ? $e->getHeaders() : [],
        //     JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES
        // );
    }

}
