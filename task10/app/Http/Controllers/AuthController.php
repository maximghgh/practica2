<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getSignup()
    {
        return view('auth.signup');
    }
    public function postSignup(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|unique:users|alpha_dash|min:8',
        ]);
        
        User::create([
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password')),
        ]);

        return redirect()->route('home')->with('info', 'Вы успешно создали аккаунт');
    }

    public function getSignin()
    {
        return view('auth.signin');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|max:255',
            'password' => 'required|min:8',
        ]);
        if(!Auth::attempt( $request->only(['email' , 'password']),$request->has('remember') ))
        {
            return redirect()->back();
        }
        return redirect()->route('home')->with('info', 'Вы успешно вошли в аккаунт');
    }
}
