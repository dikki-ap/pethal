<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        // Semua halaman yang ada di class ini bisa diakses jika statusnya adalah GUEST
        $this->middleware('guest')->except('logout');
    }

    public function login(){
        return view('login', [
            "title" => "Login"
        ]);
    }

    // Function untuk melakukan Login Teacher
    public function authenticate(Request $request){

        // Menampung input user ke variabel $credentials dengan menggunakan fungsi validate()
        $credentials = $request->validate([
            "email" => "required|email:dns",
            "password" => "required"
        ]);

        // Cek informasi yang ditampung $credentials
        if(Auth::attempt($credentials)){
            $request->session()->regenerate(); // Untuk menghindari 'session fixation'

            $user = Auth::user();

            return redirect()->intended($user->role == 'Admin' ? '/admin/product' : '/');
        }

        // return @dd($credentials);

        // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
        return back()->with('loginError', 'Login Failed!');
    }

    // Function Logout Teacher
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
        return redirect('/');
    }
}
