<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $exclude = [
        'admin/login',
        'admin/sign-in',
        'admin/forgot-password',
        'admin/register'
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->excludeRouteAdmin($request))
            return $next($request);
        if(!Auth::check() || Auth::user()->type == 3 || Auth::user()->active == 0)
            return redirect('admin/login');
        return $next($request);
    }

    private function excludeRouteAdmin($request) {
        foreach ($this->exclude as $router) {
            if($request->is($router)){
                return true;
            }
        }
        return false;
    }
}
