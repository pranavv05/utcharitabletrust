<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $token = auth('sanctum')->user();
            if ($token && $token->role === 'manager' && $token->isValid === 1 && $token->email === 'utcmaster@gmail.com') {
                return $next($request);
            } else {
                return response()->json([
                    'message' => 'Unauthenticated!',
                    'status' => 'failed',
                    'code' => 400
                ], 400);
            }
        } catch (Exception $error) {
            return response()->json([
                'message' => 'Unauthenticated!',
                'status' => 'failed',
                'code' => 400
            ], 400);
        }
    }
}
