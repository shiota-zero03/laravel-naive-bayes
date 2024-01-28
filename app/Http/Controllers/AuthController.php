<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Resources\Rules\UserRules;
use Auth;

class AuthController extends Controller
{
    protected $rules;
    public function __construct( UserRules $rules )
    {
        $this->rules = $rules;
    }
    public function login(Request $request)
    {
        $this->rules->__loginRules($request);
        $credentials = $request->only(['email', 'password']);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if(auth()->user()->role == 1){
                return redirect()->intended(route('admin.home'));
            } else {
                return back()->with('errorLogin', 'Akun tidak terdaftar sebagai admin');    
            }
        } else {
            return back()->with('errorLogin', 'Email atau password tidak ditemukan');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->to(route('login'))->with('successLogin', 'Anda sudah berhasil logout');
    }
}
