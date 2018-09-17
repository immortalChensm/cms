<?php

namespace App\Exceptions;

use Dingo\Api\Exception\ValidationHttpException;
use Exception;
use app\Helper\functions;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Exceptions\UnauthorizedException;

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
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {

        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {

        if ($exception instanceof UnauthorizedException) {
                showMsg('0', '您没有此功能的权限！无法操作');

        }

        if ($exception instanceof ResourceException) {
            showMsg('0', '数据未提交，验证错误');
        }

        return parent::render($request, $exception);
    }

    public function convertValidationExceptionToResponse(ValidationException $e, $request)
    {

        return response()->json([
            'errors' => $e->errors(),
        ], $e->status);

    }

}
