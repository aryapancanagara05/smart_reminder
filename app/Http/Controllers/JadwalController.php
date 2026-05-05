<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // 1. Mengambil semua data admin (untuk sapaan "Asep")
        $admins = Admin::all(); 

        // 2. Mengambil data pendukung lainnya (agar tidak error)
        $overdue = Jadwal::where('status', 'terlewat')->count();
        $jadwal = Jadwal::all();

        // 3. Mengirim data ke view dashboard
        return view('dashboard', [
            'Admins' => $admins,   // Ini yang dipakai di @foreach
            'overdue' => $overdue, // Ini untuk teks "pengingat terlewat"
            'jadwal' => $jadwal 
        ]);   // Ini untuk list jadwal
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
       // Validasi dan simpan data baru
        $request->validate([
            'judul_kegiatan' => 'required',
            'waktu' => 'required|integer',
            'satuan_waktu' => 'required',
        ]);

        Jadwal::create($request->all());

        return redirect()->back()->with('success', 'Jadwal berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        //
    }
}
