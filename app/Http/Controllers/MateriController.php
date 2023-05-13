<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_mapel)
    {
        //

        // dd($id_mapel);
        $listMateri = Materi::all()->where('id_mapel', '=', $id_mapel);
        $nama_mapel = MataPelajaran::where('id_mapel', $id_mapel)->value('nama_mapel');
        return view('pages.guru.materi', compact('id_mapel', 'listMateri', 'nama_mapel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_mapel)
    {
        //
        $nama_mapel = MataPelajaran::where('id_mapel', $id_mapel)->value('nama_mapel');

        // dd($nama_mapel);
        return view('pages.guru.tambah-materi', compact('id_mapel', 'nama_mapel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $validasi = $request->validate([
            'id_mapel' => 'required',
            'judul_materi' => 'required',
            // 'isi_materi' => 'required',
            // 'file' => 'file|max:2048'
        ]);

        $validasi['isi_materi'] = $request->input('isi_materi');

        if ($request->hasFile('file')) {
            $validasi['file'] = $request->file('file')->store('files', 'public');
        }

        Materi::create($validasi);

        return redirect(route('materi', ['id_mapel' => $request->input('id_mapel')]));

        // $validasi['id_mapel']

    }

    /**
     * Display the specified resource.
     */
    public function show(Materi $materi)
    {
        //
        return view();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_mapel, Materi $materi, )
    {
        //
        // dd($materi);
        $nama_mapel = MataPelajaran::where('id_mapel', $id_mapel)->value('nama_mapel');

        // dd($nama_mapel);
        return view('pages.guru.edit-materi', compact('materi', 'id_mapel', 'nama_mapel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materi $materi)
    {
        //
        $validasi = $request->validate([
            'id_mapel' => 'required',
            'judul_materi' => 'required',
            // 'isi_materi' => 'required',
            // 'file' => 'file|max:2048'
        ]);

        $validasi['isi_materi'] = $request->input('isi_materi');

        $materi->update($validasi);

        return redirect(route('materi', ['id_mapel' => $request->input('id_mapel')]));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materi $materi)
    {
        //
        $materi->delete();

        return redirect(route('materi', ['id_mapel' => $materi->id_mapel]));
    }
}
