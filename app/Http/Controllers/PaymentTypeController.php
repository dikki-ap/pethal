<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentType;
use App\Models\Service;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.payment_types.index', [
            "title" => "Payment Type List",
            "payment_types" => PaymentType::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.payment_types.create', [
            "title" => "Add Payment Type",
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
            'name' => 'required|max:30|unique:payment_types',
        ]);

        // Menyimpan data yang diinput ke dalam DB dengan fungsi create()
        PaymentType::create($validatedData);

        // Redirect ke halaman yang ditentukan dengan menampilkan pesan yang ditentukan
        return redirect('/admin/payment-type')->with('success', 'Successfully Added New Payment Type');
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
        return view('dashboard.payment_types.edit', [
            "title" => "Edit Payment Type",
            "payment_type" => $paymentType,
        ]);
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
        // Menampung data yang diinput oleh user ke variabel $validatedData dengan fungsi validate()
        $validatedData = $request->validate([
            'name' => 'required|max:30|unique:payment_types',
        ]);

        // Mengubah data yang ada di DB dengan fungsi update() dengan kondisi where()
        PaymentType::where('id', $paymentType->id)->update($validatedData);

        // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
        return redirect('/admin/payment-type')->with('success', 'Successfully Changed the Payment Type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentType $paymentType)
    {
        // Ambil jumlah Material berdasarkan Category ID
        $servicesCount = Service::where('payment_type_id', $paymentType->id)->count();
        $transactionsCount = Transaction::where('payment_type_id', $paymentType->id)->count();
        $paymentsCount = Payment::where('payment_type_id', $paymentType->id)->count();
        if($servicesCount > 0 || $transactionsCount > 0 || $paymentsCount > 0){
            // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
            return redirect('/admin/payment-type')->with('error', 'Can\'t Delete Payment Type Because There\'s a Data Related to This Payment Type');
        }else{
            PaymentType::destroy($paymentType->id);

            // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
            return redirect('/admin/payment-type')->with('success', 'Payment Type Has Been Successfully Deleted');
        }
    }
}
