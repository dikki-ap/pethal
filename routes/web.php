<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleImageController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\GuestArticleController;
use App\Http\Controllers\GuestProductController;
use App\Http\Controllers\GuestServiceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\PetTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\TransactionController;
use App\Models\Article;
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
    $articles = Article::take(3)->get();
    return view('home',[
        "title" => "Home",
        "articles" => $articles,
        "articleCount" => Article::count()
    ]);
});

Route::get('articles', [GuestArticleController::class, 'index']);

Route::get('articles/{article:id}', [GuestArticleController::class, 'show']);

Route::get('products', [GuestProductController::class, 'index']);

Route::get('products/{product:id}', [GuestProductController::class, 'show']);

Route::get('services', [GuestServiceController::class, 'index']);

Route::get('services/{serviceType:id}', [GuestServiceController::class, 'show']);


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

// Article (Resource)
Route::resource('/admin/article', ArticleController::class);

// Article Image (Resource)
Route::resource('/admin/article-image', ArticleImageController::class);

// Service (Resource)
Route::resource('/user/services', ServiceController::class);

// Transaction (Resource)
Route::resource('/user/transactions', TransactionController::class);

// Payment (Resource)
Route::resource('/user/payments', PaymentController::class);