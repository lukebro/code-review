<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class RedirectIfNotTeacher
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
        if (! Auth::user()->isTeacher()) {
            return redirect('dashboard');
        }

        return $next($request);
    }
}
