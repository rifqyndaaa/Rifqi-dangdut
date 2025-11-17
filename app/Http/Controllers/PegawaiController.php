<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
  // Data dasar
        $name = "Fahrezy";
        $tglLahir = Carbon::create(2006, 2, 25); // contoh tanggal lahir
        $tglHarusWisuda = Carbon::create(2026, 8, 30); // contoh tanggal wisuda
        $currentSemester = 3; //  semester saat ini
        $futureGoal = "Menjadi Fullstack Developer";

        // Hitung umur
        $myAge = $tglLahir->age;

        // Hitung jarak hari dari hari ini ke tgl harus wisuda
        $timeToStudyLeft = now()->diffInDays($tglHarusWisuda, false);

        // Hobi minimal 5 item
        $hobbies = [
            "Membaca",
            "Ngoding",
            "Main Musik",
            "Olahraga",
            "Nonton Film"
        ];

        // Pesan motivasi sesuai semester
        $motivasi = $currentSemester < 3
            ? "Masih Awal, Kejar TAK"
            : "Jangan main-main, kurang-kurangi main game!";

        // Passing data ke view
        return view('pegawai.index', [
            'name' => $name,
            'my_age' => $myAge,
            'hobbies' => $hobbies,
            'tgl_harus_wisuda' => $tglHarusWisuda->toDateString(),
            'time_to_study_left' => $timeToStudyLeft,
            'current_semester' => $currentSemester,
            'motivasi' => $motivasi,
            'future_goal' => $futureGoal
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
