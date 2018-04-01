<?php

namespace GsTest\Http\Middleware;

use Closure;
use GsTest\Model\TypeUser;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {

            if(Auth::user()->type_user->id == TypeUser::ADMIN){
                return redirect('/admin/home');
            }else{
                return redirect('/employee/home');
            }

        }

        return $next($request);
    }
}
