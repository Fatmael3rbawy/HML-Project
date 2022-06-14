<?php

namespace Users\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Users\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Users\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    use GeneralTrait;

    public function login(LoginRequest $request)
    {

        $credentials = $request->validated();
        if (!auth()->attempt($credentials)) {
            return $this->returnError('The given data is invalid');
        }

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('auth-token')->plainTextToken;

        return $this->returnData('access_token',  $token,  " You are loged in succesfully");
    }

    
    public function logout()
    {
        Auth::user()->logout;
        return $this->returnSuccessMessage('You are logged out successfully');
    }
}
