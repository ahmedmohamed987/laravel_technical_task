<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyRequestSource
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $referer = $request->headers->get('referer');

        if (!$referer || strpos($referer, url('/')) === false) {
            return redirect('home')->with('error', 'Access Denied: You must use the button to view this item.');
        }

        return $next($request);
    }
}
