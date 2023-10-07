<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.service_types.index', [
            "title" => "Service Type List",
            "service_types" => ServiceType::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.service_types.create', [
            "title" => "Add Service Type",
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
            'name' => 'required|max:30',
            'price' => 'required|numeric|min:1',
            'description' => 'required',
            'isNeedDoctor' => 'required|boolean'
        ]);

        // Menyimpan data yang diinput ke dalam DB dengan fungsi create()
        ServiceType::create($validatedData);

        // Redirect ke halaman yang ditentukan dengan menampilkan pesan yang ditentukan
        return redirect('/admin/service-type')->with('success', 'Successfully Added New Service Type');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceType $serviceType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceType $serviceType)
    {
        return view('dashboard.service_types.edit', [
            "title" => "Edit Service Type",
            "service_type" => $serviceType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceType $serviceType)
    {
        // Menampung data yang diinput oleh user ke variabel $validatedData dengan fungsi validate()
        $validatedData = $request->validate([
            'name' => 'required|max:30',
            'price' => 'required|numeric|min:1',
            'description' => 'required',
            'isNeedDoctor' => 'required|boolean'
        ]);

        // Mengubah data yang ada di DB dengan fungsi update() dengan kondisi where()
        ServiceType::where('id', $serviceType->id)->update($validatedData);

        // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
        return redirect('/admin/service-type')->with('success', 'Successfully Changed the Service Type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceType $serviceType)
    {
        // Ambil jumlah Material berdasarkan Category ID
        $servicesCount = Service::where('service_type_id', $serviceType->id)->count();
        if($servicesCount > 0){
            // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
            return redirect('/admin/service-type')->with('error', 'Can\'t Delete Service Type Because There\'s a Data Related to This Service Type');
        }else{
            ServiceType::destroy($serviceType->id);

            // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
            return redirect('/admin/service-type')->with('success', 'Service Type Has Been Successfully Deleted');
        }
    }
}
