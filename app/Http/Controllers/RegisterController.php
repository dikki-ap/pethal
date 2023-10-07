<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(){
        return view('register', [
            "title" => "Register"
        ]);
    }

    // Function menyimpan data Register ke DB
    public function store(Request $request){
        
        // Menampung input user ke $validatedData dengan fungsi validate()
        $validatedData = $request->validate([
            // Bisa juga menggunakan array
            "name" => "required|max:30", //  => ['required', 'max:30']
            "email" => "required|email:dns|unique:users",
            "password" => "required|min:3|max:16",
            "phone" => "required|min:11|max:13",
        ]);

        // Cara 1
        // $validatedData['password'] = bcrypt($validatedData['password']);

        // Hash Password
        // Cara 2
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Jika yang diatas true, maka akan otomatis akan dijalankan yang bawah
        // Menyimpan data Teacher ke DB dengan fungsi create()
        User::create($validatedData);

        // Flash Message (BISA DENGAN INI)
        // $request->session()->flash('success', 'Registration Successful');

        // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
        return redirect('/')->with('success', 'Registration Successful');
    }
}
