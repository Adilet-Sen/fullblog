<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Http\Requests\Admin\AuthRequest;
use App\Http\Requests\Admin\RegisterAuthRequest;

class AuthController extends Controller
{
    public function registerShow()
    {
        return view('pages.register');
    }

    public function register(RegisterAuthRequest $request)
    {
        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));

        return redirect('/login');
    }

    public function loginShow()
    {
        return view('pages.login');
    }

    public function login(AuthRequest $request)
    {
        if(Auth::attempt([
            'email'	=>	$request->get('email'),
            'password'	=>	$request->get('password')
        ]))
        {
            return redirect('/');
        }

        return redirect()->back()->with('status', 'Incorrect login or password!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
