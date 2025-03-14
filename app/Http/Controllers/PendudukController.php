<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $penduduk = Penduduk::all();
        return response()->json(['data' => $penduduk], 200);
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
        $validated = $request->validate([
            'kartu_keluarga_id' => 'required|exists:kartu_keluargas,id',
            'nik' => 'required|unique:penduduks,nik|digits:16',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'pekerjaan' => 'required|string|max:255',
        ]);

        $penduduk = Penduduk::create($validated);

        return response()->json($penduduk, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Penduduk $penduduk)
    {
        //
        return response()->json($penduduk->load('kartuKeluarga'));
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
    public function update(Request $request, Penduduk $penduduk)
    {
        //
        $validated = $request->validate([
            'kartu_keluarga_id' => 'required|exists:kartu_keluargas,id',
            'nik' => "required|digits:16|unique:penduduks,nik,{$penduduk->id}",
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'pekerjaan' => 'required|string|max:255',
        ]);

        $penduduk->update($validated);

        return response()->json($penduduk, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penduduk $penduduk)
    {
        //
        $penduduk->delete();
        return response()->json(['message' => 'Penduduk berhasil dihapus'], 200);
    }
}
