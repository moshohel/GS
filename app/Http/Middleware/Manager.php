<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class Manager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // $request->authenticate();
        
        if(Auth()->user()->user_type == 'MANAGER'){ // admin = 1 superAdmin = 2
            return $next($request);
        }
        else{
            return redirect()->route('login')->with('error', 'You do not have permission to access this page !');
        }

        // return response()->json('You Need to be super Admin');

        // return $next($request);
    }
}
