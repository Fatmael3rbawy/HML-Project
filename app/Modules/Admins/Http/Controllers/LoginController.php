<?php

namespace Admins\Http\Controllers;

use Admins\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Admins::auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $credentials = $request->validated();
        $remember_me = $request->has('rememberme') ? true : false;

        if (Auth::guard('admin')->attempt($credentials ,$remember_me)) {
            return redirect('/admin/dashboard');
        }

        return back()->with('error', ' Sorry, Your data is wrong');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }
}
