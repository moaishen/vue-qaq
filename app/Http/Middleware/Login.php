<?php

namespace App\Http\Middleware;

use Closure;
use App\Utils\Utils;

class Login
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
        if (!session('user_id')) {
            return response(Utils::err('login required!'));
        }
        return $next($request);
    }
}
