<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     */
    public function loginForm(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('pages.login');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/invoice/index'); // Redirect to dashboard on successful login
        }

        return redirect()->back()->withErrors(['login' => 'Invalid email or password']);
    }

    /**
     * @return \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
     */
    public function logout(): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        Auth::logout();

        return redirect('/login');
    }
}

