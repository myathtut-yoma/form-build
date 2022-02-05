<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
        //exception response for content not found.
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'status' => 404,
                'message' => str_replace('App\\', '', $exception->getModel()) . ' not found'], 404);
        }
        //exception response for route not found.
        $this->renderable(function (NotFoundHttpException $e, $request) {
            return response()->json([
                'status' => 400,
                'message' => 'Route not found.',], 400);
        });

        return parent::render($request, $exception);
    }

}
