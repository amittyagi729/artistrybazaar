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
        if ($request->isMethod('post')) {
            $ip = $request->ip();
            $cacheKey = "rate_limit_{$ip}";
            $decaySeconds = 60;

            if (Cache::has($cacheKey)) {
                return redirect()->back();
            }

            Cache::put($cacheKey, true, $decaySeconds);
        }
        return $next($request);
    }
}
