<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AccountController extends Controller
{
    
    //register form
    public function register(): View {
        return view('register');
    }
        

    //register and log in
    public function createUser(Request $request){

        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['email', 'required'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user) {
            
            return redirect('/login')->with('message', 'Looks like you already have an account. Please, log in.');
        }

        $user = User::create($credentials);


        if (Auth::attempt($credentials)) {

            //user data
            $user = Auth::user();

            $request->session()->regenerate();
            return redirect()->intended('/home')->with('user', $user);
        }
    }


    //login form
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

    //home
    public function home(){

        if(Auth::check())
        {
            return view('account.home');
        }else {
            return view('login'); 
        }
        
    }

    //profile
    public function profile()
    {
        if(Auth::check())
        {
            return view('account.profile');
        }else {
            return view('login'); 
        }
    }
}
