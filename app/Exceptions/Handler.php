<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        // Check if the exception is an instance of NotFoundHttpException (404)
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            return response()->view('errors.404', [], 404);
        }
        // Check if the exception is an instance of MethodNotAllowedHttpException (405)
        elseif ($exception instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException) {
            return response()->view('errors.405', [], 405);
        }
        // Check if the exception is an instance of HttpException (other HTTP errors)
        elseif ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException) {
            // Handle 500 Internal Server Error specifically if needed
            if ($exception->getStatusCode() == 403) {
                return response()->view('errors.403', [], 403);
            }
            // Handle other HttpException errors
            return response()->view("errors.{$exception->getStatusCode()}", [], $exception->getStatusCode());
        }

        return parent::render($request, $exception);
    }
}
