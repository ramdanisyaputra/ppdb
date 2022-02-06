<?php

namespace App\Http\Middleware;

use Closure;

class CheckPeserta
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
        if (session()->get('role') == 'peserta') {
            return $next($request);
        }
        return redirect()->back();

    }
}
?>