<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register ( Request $request )
    {
        $fields = $request->validate([
            'name'      => 'required|max:100',
            'email'     => 'required|max:255|email|unique:users',
            'password'  => 'required|min:4|confirmed'
        ]);

        $user = User::create( $fields );

        Auth::login( $user );

        return redirect()->route('home')->with('success', 'Registration Successfully');

    }

    public function login ( Request $request ) 
    {
        $fields = $request->validate([
            'email'     => 'required|max:255',
            'password'  => 'required'
        ]);

        if (Auth::attempt($fields, $request->rember)) {
            return redirect()->intended('/')->with('success', 'Login Successfully');
        } else {
            return back()->withErrors([
                'failed' => 'The provide credentials don\'t match our records'
            ]);
        }
    }

    public function logout ( Request $request )
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logout Successfully');
    }
}
