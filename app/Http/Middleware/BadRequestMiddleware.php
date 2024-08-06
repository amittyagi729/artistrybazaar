<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class RateLimitPostRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Only apply this logic to POST requests
        if ($request->isMethod('post')) {
            die();
            $ip = $request->ip();
            $cacheKey = "rate_limit_{$ip}";
            $maxAttempts = 1;
            $decaySeconds = 1000;

            if (Cache::has($cacheKey)) {
                return response()->json(['error' => 'Too many attempts. Please try again later.'], Response::HTTP_TOO_MANY_REQUESTS);
            }

            Cache::put($cacheKey, true, $decaySeconds);
        }

        return $next($request);
    }
}
