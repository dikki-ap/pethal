<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Payment;
use App\Models\PetType;
use App\Models\Service;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class GuestServiceController extends Controller
{
    public function index(){
        $services = ServiceType::latest()->paginate(6);
    
        return view('services', [
            "title" => "All Services",
            "services" => $services,
            "serviceCount" => ServiceType::count()
        ]);
    }
    public function show(ServiceType $serviceType){
        // $images = ArticleImage::select('url')->where('article_id', '=', $article->id)->get();
        // dd($images);
        if(Auth::check()){
            $userId = auth()->user()->id;
            // Retrieve all services for the logged-in user
            $payments = Payment::with('payment_type')->where('user_id', $userId)->get();
        }
        
        $now = Carbon::now();
    
        // Ubah format tanggal menjadi format default MySQL datetime
        $formattedDate = $now->toDateTimeString();
        return view('service', [
            "title" => $serviceType->name,
            "doctors" => Doctor::all(),
            "service" => $serviceType,
            "pet_types" => PetType::all(),
            "payments" => Auth::check() ? $payments : null,
            "service_date" => $formattedDate
        ]);
    }
}
