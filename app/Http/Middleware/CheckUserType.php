<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$userType)
    {
        $user = Auth::user();
        if ($user->isServiceProvider() && in_array('serviceProvider',$userType)) {
            return $next($request);
        } else if ($user->isCitizen() && in_array('citizen',$userType)) {
            return $next($request);
        } else if($user->is_admin && in_array('admin',$userType)){
            return $next($request);
        }
        return redirect('/checkpoint');

       // return $next($request);

//        return response('Unauthorized.', 401);
    }
}
