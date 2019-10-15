<?php

namespace App\Http\Middleware;

use Closure;

class midSession
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
        $this->MakeSessionMsg($request);
        return $next($request);
        // if (!$request->session()->has('login_state')) {
        //     return redirect('Login');
        // }
        // else {

        // }
    }
    // Middleware belum didaftarkan

    private function MakeSessionMsg($request)
    {
        if (!$request->session()->has('msgType')) {
            $request->session()->put('msgType', '');
        }

        if (!$request->session()->has('msgStr')) {
            $request->session()->put('msgStr', '');
        }
    }
}
