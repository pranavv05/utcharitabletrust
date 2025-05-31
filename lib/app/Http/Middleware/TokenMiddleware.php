<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $token = $request->header('Authorization');
            if ($token && $token === "fFxfUyGwDZgFP9KSaZfxfyvpXU3LVA3nXSBdD67CDvs") {
                return $next($request);
            } else {
                return response()->json([
                    'message' => 'Unauthorized!',
                    'status' => 'failed',
                    'code' => 401,
                ], 401);
            }
        } catch (Exception $error) {
            return response()->json([
                'message' => 'Unauthorized!',
                'status' => 'failed',
                'code' => 401
            ], 401);
        }
        // return $next($request);
    }
}
