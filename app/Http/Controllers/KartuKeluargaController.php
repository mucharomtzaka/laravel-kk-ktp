<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KartuKeluarga;

class KartuKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(KartuKeluarga::with('penduduks')->get());
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
        try {
            $data = $request->validate([
                'nomor_kk' => 'required|numeric|digits:16|unique:kartu_keluargas,nomor_kk',
                'kepala_keluarga' => 'required|string|max:255',
                'alamat' => 'required|string|max:255',
            ]);

            $kk = KartuKeluarga::create($data);

            return response()->json([
                'message' => 'Kartu Keluarga berhasil dibuat',
                'data' => $kk
            ], 201);
        } catch (\Exception $e) {
            \Log::error('Error Store KartuKeluarga: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(KartuKeluarga $kartuKeluarga)
    {
        //
        return response()->json($kartuKeluarga->load('penduduks'));
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
    public function update(Request $request, $id)
    {
        $kk = KartuKeluarga::find($id);

        if (!$kk) {
            return response()->json(['error' => 'Kartu Keluarga tidak ditemukan'], 404);
        }

        // Validasi data
        $validated = $request->validate([
            'nomor_kk' => 'required|numeric|digits:16|unique:kartu_keluargas,nomor_kk,' . $id,
            'kepala_keluarga' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        // Update data
        $kk->update($validated);

        return response()->json(['message' => 'Kartu Keluarga berhasil diperbarui', 'data' => $kk], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $kk = KartuKeluarga::find($id);

        if (!$kk) {
            return response()->json(['error' => 'Kartu Keluarga tidak ditemukan'], 404);
        }

        $kk->delete();

        return response()->json(['message' => 'Kartu Keluarga berhasil dihapus'], 200);
    }
}
