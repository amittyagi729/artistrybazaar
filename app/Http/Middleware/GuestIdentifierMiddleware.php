<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\UserActivity;
use Illuminate\Support\Facades\Auth;
use Session;

class GuestIdentifierMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('guest_identifier')) {
            $guestIdentifier = Str::random(32); // Generate a unique token as the guest identifier
            $request->session()->put('guest_identifier', $guestIdentifier);
        }

        if (Auth::check()) {
            $user = auth()->user();

            if (!$user->hasRole('admin')) {
                // User is authenticated
                $sessionId = Session::get('userToken');
                $couponEmail = Session::get('couponEmail');
                $user = Auth::user(); // Retrieve the authenticated user model
                $url = $request->url();
                if (strpos($url, 'asset') === false) {
                    // Create UserActivity for URLs not containing "asset"
                    if ($couponEmail) {
                        $url = $request->url();
                        if (strpos($url, 'asset') === false) {
                            UserActivity::create([
                                'user_id' => $user->id,
                                'session_id' => $sessionId,
                                'url' => $url,
                                'email' => $couponEmail,
                                'ip_address' => $request->ip()
                            ]);
                        }
                    } else {
                        UserActivity::create([
                            'user_id' => $user->id,
                            'session_id' => $sessionId,
                            'url' => $url,
                            'ip_address' => $request->ip()
                        ]);

                    }

                }
            }
        } else {
            $sessionId = Session::get('guest_identifier');
            $couponEmail = Session::get('couponEmail');
            if ($couponEmail) {
                $url = $request->url();
                if (strpos($url, 'asset') === false) {
                    UserActivity::create([
                        'session_id' => $sessionId,
                        'url' => $url,
                        'email' => $couponEmail,
                        'ip_address' => $request->ip()
                    ]);
                }
            } else {
                $url = $request->url();
                if (strpos($url, 'asset') === false) {
                    UserActivity::create([
                        'session_id' => $sessionId,
                        'url' => $url,
                        'ip_address' => $request->ip()
                    ]);
                }
            }

        }

        return $next($request);
    }
}
