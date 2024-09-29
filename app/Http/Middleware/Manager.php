<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Manager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = auth()->user();

        if(!$user) return redirect()->route('login');

        if ($user->user_type !== 'MANAGER') {
            return redirect('error-404');
        }

        // return response()->json('You Need to be super Admin');

        return $next($request);
    }
}
