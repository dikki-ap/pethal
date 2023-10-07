<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home',[
        "title" => "Home"
    ]);
});

// Register (View)
Route::get('/register', [RegisterController::class, 'register']);
// Register (POST)
Route::post('/register', [RegisterController::class, 'store']);

// Login (View)
Route::get('/login', [LoginController::class, 'login'])->name('login');

// Login (POST)
Route::post('/login', [LoginController::class, 'authenticate']);

// Logout (POST)
Route::post('/logout', [LoginController::class, 'logout']);

// Products (View)
Route::resource('/admin/product', ProductController::class);