<?php

namespace App\Http\Middleware;

use App\Libraries\ResponseBase;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateDriver
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
        $driver = Auth::guard('api-drivers')->user();
        
        if(!$driver) {
            return ResponseBase::error(401, "Please login to access this page");
        }

        return $next($request);
    }
}
