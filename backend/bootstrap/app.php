<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Domain\Exceptions\Auth\{UserNotFoundException, InvalidCredentialsException};
use App\Domain\Exceptions\Comment\PostNotFoundException;
use App\Domain\Exceptions\Reply\CommentNotFoundException;
use Throwable;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {

        // auth global exceptions
        $exceptions->render(
            function (InvalidCredentialsException $e, Request $request) {
                return response()->json([
                    'message' => $e->getMessage(),
                ], 401);
            }
        );

        $exceptions->render(
            function (UserNotFoundException $e, Request $request) {
                return response()->json([
                    'message' => $e->getMessage(),
                ], 404);
            }
        );

        // comment global exceptions
        $exceptions->render(
            function (PostNotFoundException $e,Request $request) {
                return response()->json([
                    'message' => $e->getMessage(),
                ], 404);
            }
        );

        // reply global exceptions
        $exceptions->render(
            function (CommentNotFoundException $e,Request $request) {
                return response()->json([
                    'message' => $e->getMessage(),
                ], 404);
            }
        );
        
        // database error
        $exceptions->render(
            function (QueryException $e, Request $request) {
                return response()->json([
                    'message' => 'Database error occurred.'
                ], 500);
            }
        );

        // unexpected error
        // $exceptions->render(
        //     function (Throwable $e, Request $request) {
        //         return response()->json([
        //             'message' => 'Internal server error.'
        //         ], 500);
        //     }
        // );

    })->create();
