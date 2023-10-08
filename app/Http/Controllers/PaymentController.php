<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentType;
use App\Models\Service;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        // Retrieve all services for the logged-in user
        $payments = Payment::with('payment_type')->where('user_id', $userId)->get();
        return view('dashboard.payments.index', [
            "title" => "Payment Type List",
            "payment_types" => $payments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userId = auth()->user()->id;

        // Subquery untuk mengambil payment_type_id yang terkait dengan user_id tertentu
        $subquery = Payment::where('user_id', $userId)->select('payment_type_id');

        // Ambil semua PaymentType yang tidak terkait dengan user_id tertentu atau yang belum terkait dengan user mana pun
        $payment_types = PaymentType::whereNotIn('id', $subquery)->get();

        return view('dashboard.payments.create', [
            "title" => "Payment Type List",
            "payment_types" => $payment_types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Menampung data yang diinput user ke variabel $validateData dengan fungsi validate()
        $validatedData = $request->validate([
            'payment_type_id' => 'required',
        ]);

        // Menyimpan data yang diinput ke dalam DB dengan fungsi create()
        Payment::create([
            "user_id" => auth()->user()->id,
            "payment_type_id" => $validatedData["payment_type_id"]
        ]);

        // Redirect ke halaman yang ditentukan dengan menampilkan pesan yang ditentukan
        return redirect('/user/payments')->with('success', 'Successfully Added New Payment Type');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentType $paymentType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentType $paymentType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentType $paymentType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user_id = auth()->user()->id;
        // Ambil jumlah Material berdasarkan Category ID
        $servicesCount = Service::where('user_id', $user_id)->count();
        $transactionsCount = Transaction::where('user_id', $user_id)->count();
        if($servicesCount > 0 || $transactionsCount > 0){
            // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
            return redirect('/user/payments')->with('error', 'Can\'t Delete Payment Type Because There\'s a Data Related to This Payment Type');
        }else{
            Payment::destroy($user_id);

            // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
            return redirect('/user/payments')->with('success', 'Payment Type Has Been Successfully Deleted');
        }
    }
}
