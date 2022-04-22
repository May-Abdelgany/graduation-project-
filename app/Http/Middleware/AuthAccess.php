<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AuthAccess
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
        if ($request->user()->role == User::ADMIN ||$request->user()->role== User::TEACHER ||$request->user()->role==USER::STUDENT) return $next($request);
        return $next($request);
        return abort(403,'You have no access');
    }
}
