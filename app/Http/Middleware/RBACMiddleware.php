<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RBACMiddleware
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
      // Cek apakah User sudah login
      if(!Auth::check()){
           return redirect()->route('auth.login');
      }

      if(Auth::user()->role->name == 'Super Admin'){
           return $next($request);
      }
      //retrieve semua permission yang dimiliki user sesuai dengan rolenya
      $role = Auth::user()->role;
      $permissions = [];
      foreach($role->permissionRoles as $perm){
           array_push($permissions, $perm->permission->route_name);
      }

      // dd($permissions);

      // dd($request->route()->getName());

      //cek apakah user memiliki permission yang dibandingkan dengan nama route
      if(!in_array($request->route()->getName(), $permissions)){
           abort(403);
      }
      return $next($request);
   }
}
