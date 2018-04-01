<?php

namespace GsTest\Http\Middleware;

use GsTest\Model\TypeUser;
use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        if (Auth::user()->type_user->id != TypeUser::ADMIN) {
            return redirect('/');
        }

        return $next($request);
    }
}
