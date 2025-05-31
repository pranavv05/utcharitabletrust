<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        if ($exception->getMessage() === "Unauthenticated.") {
            return response()->json([
                'message' => 'Unauthenticated!',
                'status' => 'failed',
                'code' => 404
            ], 404);
        }

        // if($exception->getMessage() === "Too Many Attempts."){
        //     return response()->json([
        //         'message' => 'You Have Reached Your Limit, Try After 24 Hours!',
        //         'status' => 'failed',
        //         'code' => 404
        //     ], 404);
        // }

        $this->renderable(function (Throwable $e) {
            return response()->json(['message' => 'Something Went Wrong!', 'status' => 'failed', 'error' => $e->getMessage(), 'code' => 404], 404);
        });

        if ($request->is('api/*')) {
            return response()->json([
                'message' => 'Something Went Wrong!',
                'status' => 'failed',
                'error' => $exception->getMessage(),
                'code' => 404
            ], 404);
        }
    }
}
