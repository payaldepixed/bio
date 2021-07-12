<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = 'web') {

		if (Auth::guard($guard)->check() && Auth::user()->user_type != 1) {
			return redirect('login')->withErrors('You have no access to login.');
		}

		return $next($request);
	}
}
