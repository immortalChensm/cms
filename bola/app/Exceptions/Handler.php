<?php

namespace App\Exceptions;

use Exception;
use app\Helper\functions;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;
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

        if(preg_match('/This action is unauthorized/',$exception->getMessage())){

            if(request()->isXmlHttpRequest()){
                showMsg('0', '您没有此功能的权限！无法操作');
            }



        }else{

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
