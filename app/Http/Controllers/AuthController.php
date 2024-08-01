<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showRegister()
    {
        return view("register");
    }
    public function register(RegisterRequest $request)
    {
            
            $data = $request->validated();
            
            $user = User::create($data);

            Auth::login($user);

            return redirect()->route("posts")->with("success","You are successfully login");
        
    }

        public function showLogin()
    {
        return view("login");
    }
        public function login(LoginRequest $request)
    {
            
            $data = $request->validated();

            if(Auth::attempt($data)) {
                
                $request->session()->regenerate();

                return redirect()->route("posts")->with("success","You are successfully login");
            }

        return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

        
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
