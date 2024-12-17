<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogIncomingRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $referer = $request->headers->get('referer');

        if (!$referer || strpos($referer, url('/')) === false) {
            return redirect('/')->with('error', 'Access Denied: You must use the button to view this page.');
        }

        return $next($request);
    }

}
