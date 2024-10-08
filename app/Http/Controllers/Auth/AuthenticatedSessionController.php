<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\http\Controllers\BuildingController;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('home', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    public function customLogin(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();

        $request->session()->regenerate();

        $input = $request->all();
        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        // $validatedData = $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        // check if the given user exists in db
        if(Auth::attempt(['email'=> $input['email'], 'password'=> $input['password']])){
            // check the user role
            if(Auth::user()->user_type == 'CARETAKER'){
                return redirect()->route('dashboard');
            }
            elseif (Auth::user()->user_type == 'MANAGER') {
                return redirect()->route('home');
            }
            elseif (Auth::user()->user_type == 'ADMIN') {
                // dd('Admin------------------------');
                return redirect()->route('buildings.index');
            }
        }
        else{
            return redirect()->route('login')->with('error', "Wrong credentials");
        }

    }
}
