<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\PetTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ServiceTypeController;
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

// --- Product ---
// Products (Resource)
Route::resource('/admin/product', ProductController::class);

// Product Types (Resource)
Route::resource('/admin/product-type', ProductTypeController::class);

// Product Image (Resource)
Route::resource('/admin/product-image', ProductImageController::class);

// Service Type (Resource)
Route::resource('/admin/service-type', ServiceTypeController::class);

// Pet Type (Resource)
Route::resource('/admin/pet-type', PetTypeController::class);

// Payment Type (Resource)
Route::resource('/admin/payment-type', PaymentTypeController::class);

// Doctor (Resource)
Route::resource('/admin/doctor', DoctorController::class);