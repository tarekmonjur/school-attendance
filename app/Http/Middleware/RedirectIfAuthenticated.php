<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

class RedirectIfAuthenticated extends Controller
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!$this->auth->guard($guard)->guest()) {
            if ($request->header('api-token')) {
                return $this->setJsonMessage([], 'error', 401, 'Unauthorized!', 'User Unauthorized Access!');
            }
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
