<?php

namespace App\Http\Controllers\Admin\Authentication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }


    public function authenticate(Request $request)
    {
             if (Auth::attempt($this->credentials($request), true)) {

            $request->session()->regenerate();

             if (Auth::user()->hasRole('admin') || auth()->user()->is_admin == 1)
            {
                return redirect()->intended('admin/dashboard');
            } else {
                return redirect()->intended('client/dashboard');
            }
        }
         return back()->withErrors([
            'password' => 'The provided credentials do not match our records.',
        ]);
    }

    protected function credentials(Request $request)
    {
        if(is_numeric($request->get('email'))){

            return ['phone'=>$request->get('email'),'password'=>$request->get('password')];
        }
        elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {

            return ['email' => $request->get('email'), 'password'=>$request->get('password')];
        }

        return ['name' => $request->get('email'), 'password'=>$request->get('password')];
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
       $request->session()->regenerateToken();
        return redirect('/login');
    }
}
