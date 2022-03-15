<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

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
        // dd( str_contains($request->route()->getName(), 'edit') );
        // $user = User::where('email', $request->email)->first();
        // if ( str_contains($request->route()->getName(), 'user') ) {
        //     // if (condition) {
        //     //     # code...
        //     // }
        // }
        return $next($request);
    }
}
