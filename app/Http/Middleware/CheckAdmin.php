<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
  
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if ($user && $user->name == 'admin') {
            return $next($request);
        }

        return redirect()->route('home'); // Change 'home' to the desired route name
    }
}
