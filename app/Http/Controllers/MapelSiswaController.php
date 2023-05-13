<?php

namespace App\Http\Controllers;

use App\Models\MapelSiswa;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MapelSiswaController extends Controller
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
        $kodeMapel = MataPelajaran::all()->where('kode', $request->kode)->first();
        if ($kodeMapel) {
            $udahJoin = MapelSiswa::all()->where('id_siswa', auth()->id())->where('id_mapel', $kodeMapel->id_mapel);
        }
        $validasi = $request->validate([
            'kode' => 'required',
        ]);

        $validasi['id_siswa'] = auth()->id();


        if ($kodeMapel) {

            if (!$udahJoin) {
                $alert = [
                    'status' => false,
                    'message' => "Anda sudah join!"
                ];
            } else {

                $validasi['id_mapel'] = $kodeMapel->id_mapel;
                MapelSiswa::create($validasi);
                $alert = [
                    'status' => true,
                    'message' => "Gabung kelas berhasil!"
                ];
            }

        } else {
            $alert = [
                'status' => false,
                'message' => "Kelas tidak ditemukan!"
            ];
        }

        return redirect(route('siswa'))->with('alert', $alert);
    }

    /**
     * Display the specified resource.
     */
    public function show($id_mapel)
    {
        //
        $listMateri = MapelSiswa::join('materi', 'mapel_siswa.id_mapel', '=', 'materi.id_mapel')
            // ->join('mata_pelajaran', 'mapel_siswa.id_mapel', '=', 'mata_pelajaran.id_mapel')
            ->where('materi.id_mapel', $id_mapel)
            ->distinct()
            ->get();
        $nama_mapel = MataPelajaran::where('id_mapel', $id_mapel)->value('nama_mapel');
        // dd($listMateri);
        return view('pages.siswa.materi', compact('listMateri', 'nama_mapel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MapelSiswa $mapelSiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MapelSiswa $mapelSiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MapelSiswa $mapelSiswa)
    {
        //
        // dd($mapelSiswa);
        $mapelSiswa->delete($mapelSiswa);
        return redirect('/');
    }
}
