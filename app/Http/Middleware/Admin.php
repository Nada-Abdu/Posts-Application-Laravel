<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use App\Enums\UserRoles;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        if ($user->isAdmin())
            return $next($request);

        return redirect('/');
    }
}
