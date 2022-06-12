<?php

namespace Users\Http\Controllers;

use Users\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        return view('Users::auth.login');
    }

   
    public function store(Request $request)
    {
      //  $credentials = $request->validated();
        $remember_me = $request->has('rememberme') ? true : false;
        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials ,$remember_me)) {
            return redirect(route('home'));
        }

        return back()->with('error', ' Sorry, Your data is wrong');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
