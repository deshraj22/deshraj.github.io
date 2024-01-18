<?php

namespace App\Http\Middleware;
use Closure;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $id = auth()->id();
            $u = User::find($id);
            $userName = $u->name;
        
            if ($userName == "admin") {
                return $next($request);
            } else {
                return redirect("/");
            }
        } else {
            return redirect("/"); // Redirect to the login page if not authenticated
        }
     
    
         
      
        
    
     
      
    }
}
