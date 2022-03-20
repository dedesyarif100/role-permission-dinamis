<?php

namespace App\Http\Middleware;

use App\Models\UserPermission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$permissions)
    {
        // Inspecting The Current Route
        // dd($request->route()->named('user.index'), $permissions);

        // dd(Auth::user()->permissions->toArray(), $permissions);
        foreach (Auth::user()->permissions->toArray() as $userPermission) {
            $userPermissions[] = $userPermission['name'];
        }
        foreach ($permissions as $permission) {
            if (! in_array($permission, $userPermissions)) {
                abort(403);
            }
        }
        return $next($request);
    }
}
