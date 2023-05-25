<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    //login
    public function login(): View{

        return view('login');
    }

    //auth
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['email', 'required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            //user data
            $user = Auth::user();

            $request->session()->regenerate();
            return redirect()->intended('/home')->with('user', $user);
        }
        
        return back()->withErrors([
            'email' => 'incorrect email',
            'password' => 'incorrect password',
        ]);
    }



    //logout
    public function logout(Request $request): RedirectResponse{
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    
    }

    public function home(){

        if(Auth::check())
        {
            return view('account.home');
        }else {
            return 'you must log in first.';   
        }
        
    }

    //profile
    public function profile()
    {
        if(Auth::check())
        {
            return view('account.profile');
        }else {
            return 'you must log in first.';   
        }
    }
}
