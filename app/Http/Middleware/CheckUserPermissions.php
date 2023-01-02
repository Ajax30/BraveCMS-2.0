<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    // Permissions checker
    public function hasPermissionTo($permission) {
        return in_array($permission, Auth::user()->role->permissions->pluck('slug')->toArray());
    }

    public function handle(Request $request, Closure $next, ...$permissions)
    {
      // Check user permissions
        foreach ($permissions as $permission) {
          if (!$this->hasPermissionTo($permission)) { 
            $permission_label = join(' ',  explode('-', $permission));
            return redirect()->back()->with('error', 'You do not have permission to ' . $permission_label);
          }
        }

        return $next($request);
    }
}
