<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Redirection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RedirectMiddleware
{
    public function handle($request, Closure $next)
    {
        $path = $request->getPathInfo();
        $redirection = Redirection::where('redirect_from', $path)->first();

        if ($redirection) {
            if (Str::startsWith($redirection->redirect_to, 'https://blog.artistrybazaar.com/')) {
                return redirect()->to($redirection->redirect_to, 301);
            } else {
                return redirect()->to(url('/' . $redirection->redirect_to), 301);
            }
        }

        return $next($request);
    }
}
