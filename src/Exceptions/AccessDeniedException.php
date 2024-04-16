<?php

namespace ThemisMin\LaravelApi\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;

/**
 * 访问被拒绝异常
 * @package App\Exceptions
 */
class AccessDeniedException extends Exception
{
    public function __construct(string $message = null, int $code = 403)
    {
        parent::__construct($message, $code);
    }

    /**
     * 渲染异常
     * @return \Illuminate\Http\JsonResponse
     */
    public function render(): JsonResponse
    {
        $message = config('app.debug') ? [
            'message'   => $this->message,
            'exception' => get_class($this),
            'file'      => $this->file,
            'line'      => $this->line,
            'trace'     => collect($this->getTrace())->map(function ($trace) {
                return Arr::except($trace, ['args']);
            })->all(),
        ] : [
            'message' => $this->message,
        ];

        return response_json($message, $this->code);
    }
}
