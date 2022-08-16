<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        if (!Auth::check()) // I included this check because you have it, but it really should be part of your 'auth' middleware, most likely added as part of a route group.
           return redirect('login');

           $user = Auth::user();

        if($user->isadmin())
           return $next($request);
        // Check if user has the role This check will depend on how your roles are set up
        if($user->hasrole($role))
        {
            return $next($request);
        }
        //    return redirect('login');
        abort(403,'Action unauthorised');
    
    }


}
