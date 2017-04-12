<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class RedirectIfNotSetup
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

        if (! Auth::user()->isSetup()) {
            // TODO: this doesn't work.... :(
            session(['previous_path' => $request->path()]);
            return redirect()->route('setup');
        }

        return $next($request);
    }
}
