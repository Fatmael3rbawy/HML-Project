<?php

namespace Suppliers\Http\Controllers;

use Suppliers\Http\Requests\SupplierLoginRequest;
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
        return view('Suppliers::auth.login');
    }

    
    public function store(SupplierLoginRequest $request )
    {
        $credentials = $request->validated();
       // $credentials = $request->only('email', 'password');; 
        $remember_me = $request->has('rememberme') ? true : false;

        if (Auth::guard('supplier')->attempt($credentials ,$remember_me)) {
            
            return redirect('/supplier/dashboard');
        }

        return back()->with('error', ' Sorry, Your data is wrong');
    }

    public function logout()
    {
        Auth::guard('supplier')->logout();
        return redirect(route('supplier.login'));
    }
}
