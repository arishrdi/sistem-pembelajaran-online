<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // dd($request);
        $validasi = $request->validate([
            'nama_mapel' => 'required',
            'kelas' => 'required'
        ]);

        $validasi['kode'] = Str::random(6);
        $validasi['id_guru'] = auth()->id();

        MataPelajaran::create($validasi);

        return redirect(route('guru'));
    }

    /**
     * Display the specified resource.
     */
    public function show(MataPelajaran $mataPelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MataPelajaran $mataPelajaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MataPelajaran $mataPelajaran)
    {
        //
        $validasi = $request->validate([
            'nama_mapel' => 'required',
            'kelas' => 'required'
        ]);

        $mataPelajaran->update($validasi);

        return redirect('/guru');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MataPelajaran $mataPelajaran)
    {
        //
        $mataPelajaran->delete();

        return redirect('guru');
    }
}
