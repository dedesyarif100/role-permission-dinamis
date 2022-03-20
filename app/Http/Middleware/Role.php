<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // dd( Auth::user()->userRoles->toArray() );
        foreach (Auth::user()->userRoles as $userRole) {
            // dd($userRole->name, $roles);
            if (in_array($userRole->name, $roles)) {
                return $next($request);
            }
        }
        abort(403);
    }
}
