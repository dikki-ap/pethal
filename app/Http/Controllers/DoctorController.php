<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Doctor;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.doctors.index', [
            "title" => "Doctor List",
            "doctors" => Doctor::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $existingDayIds = Schedule::pluck('day_id')->toArray();
        // Mengambil hari yang tidak ada di dalam Schedule
        $days = Day::whereNotIn('id', $existingDayIds)->get();
        return view('dashboard.doctors.create', [
            "title" => "Add Doctor",
            "days" => $days
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
            'name' => 'required|max:50',
            'specialist' => 'required|max:20',
            'phone' => 'required|min:11|max:13',
            'days' => 'required'
        ]);

        // Menyimpan data yang diinput ke dalam DB dengan fungsi create()
        $doctor = Doctor::create($validatedData);

        // Mengambil ID dokter sebagai nilai tunggal
        $doctorId = $doctor->id;
        Schedule::create([
            'doctor_id' => $doctorId,
            'day_id' => $validatedData['days']
        ]);

        // Redirect ke halaman yang ditentukan dengan menampilkan pesan yang ditentukan
        return redirect('/admin/doctor')->with('success', 'Successfully Added New Doctor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        // Mengambil id hari yang sudah dijadwalkan untuk dokter tertentu
        $existingDayIds = Schedule::pluck('day_id')->toArray();

    // Mengambil hari yang tidak ada di dalam Schedule untuk semua dokter
    $daysNotScheduled = Day::whereNotIn('id', $existingDayIds)->get();

    // Mengambil day_id yang sudah dijadwalkan untuk dokter tertentu
    $doctorDayIds = Schedule::where('doctor_id', $doctor->id)->pluck('day_id')->toArray();

    // Mengambil hari yang sudah dijadwalkan untuk dokter tertentu
    $daysScheduled = Day::whereIn('id', $doctorDayIds)->get();

    // Gabungkan hasil dari kedua query
    $days = $daysScheduled->merge($daysNotScheduled);
                    
        return view('dashboard.doctors.edit', [
            "title" => "Edit Doctor",
            "doctor" => $doctor,
            "days" => $days,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        // Menampung data yang diinput oleh user ke variabel $validatedData dengan fungsi validate()
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'specialist' => 'required|max:20',
            'phone' => 'required|min:11|max:13',
        ]);

        $days = $request[
            'days'
        ];

        // Mengubah data yang ada di DB dengan fungsi update() dengan kondisi where()
        Doctor::where('id', $doctor->id)->update($validatedData);
        Schedule::where('doctor_id', $doctor->id)->update([
            'day_id' => $days
        ]);

        // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
        return redirect('/admin/doctor')->with('success', 'Successfully Changed the Doctor Schedule');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        Doctor::destroy($doctor->id);
        Schedule::where('doctor_id', $doctor->id)->delete();

        // Redirect ke halaman yang ditentukan dan tampilkan pesan yang ditentukan
        return redirect('/admin/doctor')->with('success', 'Pet Type Has Been Successfully Deleted');
    }
}
