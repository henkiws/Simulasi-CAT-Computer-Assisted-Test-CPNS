<?php

namespace App\Http\Middleware;

use Closure;

class SystemAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        if(!$request->session()->get('id')){
            $user=User::find($request->session()->get('id'));
            if($user->hasRole('superadmin')){
                return redirect('admin/dashboard');
            }elseif($user->hasRole('user')){
                return redirect('profile');
            }
        }
        return $next($request);
    }
}
