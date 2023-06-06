<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccessControlMiddleware
{
    use AuthorizesRequests;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //ACL
        $ignoreResources = config('acl') ['admins.ignore.acl'];

        if (!in_array(auth()->user()->email, $ignoreResources)) {
            $this->authorize($request->route()->getName());
        }
        //ACL
        return $next($request);
    }
}
