<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class GuestProductController extends Controller
{
    public function index(){
        $products = Product::with('galleries')->latest()->paginate(6);
    
        return view('products', [
            "title" => "All Products",
            "products" => $products,
            "productCount" => Product::count()
        ]);
    }
    public function show(Product $product){
        if(Auth::check()){
            $userId = auth()->user()->id;
            // Retrieve all services for the logged-in user
            $payments = Payment::with('payment_type')->where('user_id', $userId)->get();
        }
        // $userId = auth()->user()->id;
        // // Retrieve all services for the logged-in user
        // $payments = Payment::with('payment_type')->where('user_id', $userId)->get();
        $now = Carbon::now();
    
        // Ubah format tanggal menjadi format default MySQL datetime
        $formattedDate = $now->toDateTimeString();
        return view('product', [
            "title" => $product->title,
            "product" => $product,
            "images" => ProductImage::select('url')->where('product_id', '=', $product->id)->get(),
            "payments" => Auth::check() ? $payments : null,
            "transaction_date" => $formattedDate
        ]);
    }
}
