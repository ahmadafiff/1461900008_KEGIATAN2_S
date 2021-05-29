<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $data = DB::table("absen")
            ->join("siswa", "siswa.nis", "absen.nis")
            ->join("semester", "semester.id_semester", "absen.id_semester")
            ->where("semester.status", "Ganjil")
            ->get();

        // dd($data);

        return view("0008index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $data = DB::table("absen")
            ->join("siswa", "siswa.nis", "absen.nis")
            ->join("semester", "semester.id_semester", "absen.id_semester")
            ->where("semester.status", "Ganjil")
            ->where('siswa.nama', 'like', "%" . $cari . "%")
            ->get();

        // mengirim data pegawai ke view index
        return view('0008index', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit(Absen $absen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absen $absen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absen $absen)
    {
        //
    }
}
