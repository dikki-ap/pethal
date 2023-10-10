<?php

namespace App\Http\Controllers;

use App\Models\PetType;
use App\Models\Service;
use Illuminate\Http\Request;

class PetTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('IsAdmin:Admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pet_types.index', [
            "title" => "Pet Type List",
            "pet_types" => PetType::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pet_types.create', [
            "title" => "Add Pet Type",
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
            'name' => 'required|max:30|unique:pet_types',
        ]);

        // Menyimpan data yang diinput ke dalam DB dengan fungsi create()
        PetType::create($validatedData);

        // Redirect ke halaman yang ditentukan dengan menampilkan pesan yang ditentukan
        return redirect('/admin/pet-type')->with('success', 'Successfully Added New Pet Type');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PetType  $petType
     * @return \Illuminate\Http\Response
     */
    public function show(PetType $petType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PetType  $petType
     * @return \Illuminate\Http\Response
     */
    public function edit(PetType $petType)
    {
        return view('dashboard.pet_types.edit', [
            "title" => "Edit Pet Type",
            "pet_type" => $petType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PetType  $petType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PetType $petType)
    {
        // Menampung data yang diinput oleh user ke variabel $validatedData dengan fungsi validate()
        $validatedData = $request->validate([
            'name' => 'required|max:30|unique:pet_types',
        ]);

        // Mengubah data yang ada di DB dengan fungsi update() dengan kondisi where()
        PetType::where('id', $petType->id)->update($validatedData);

        // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
        return redirect('/admin/pet-type')->with('success', 'Successfully Changed the Pet Type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PetType  $petType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PetType $petType)
    {
        // Ambil jumlah Material berdasarkan Category ID
        $servicesCount = Service::where('pet_type_id', $petType->id)->count();
        if($servicesCount > 0){
            // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
            return redirect('/admin/pet-type')->with('error', 'Can\'t Delete Pet Type Because There\'s a Data Related to This Pet Type');
        }else{
            PetType::destroy($petType->id);

            // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
            return redirect('/admin/pet-type')->with('success', 'Pet Type Has Been Successfully Deleted');
        }
    }
}
