<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $guru = Guru::join('users', 'guru.id_user', '=', 'users.id')->get();

        return view('pages.admin.tampil-guru', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $id = User::orderBy('id', 'DESC')->limit(1)->first()->id + 1;
        // dd($id);
        return view('pages.admin.tambah-guru', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validasiForm = $request->validate([
            'nip' => 'required|unique:guru',
            'id_user' => 'required',
            'nama_guru' => 'required',
            'email' => 'required|email|unique:users',
            'gelar' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
        ]);

        if ($validasiForm) {
            $user = User::create([
                'email' => $request['email'],
                'tipe' => 'guru',
                'password' => Hash::make($request['email']),
            ]);

            $user->assignRole('guru');
        }

        Guru::create($validasiForm);

        return redirect(route('guru-tampil'))->with('message', 'Tambah Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        //
        $guru = Guru::join('users', 'guru.id_user', '=', 'users.id')
            ->where('users.id', $guru->id_user)
            ->get()->first();

        return view('pages.admin.edit-guru', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        //
        $validasiForm = $request->validate([
            'nip' => 'required',
            'nama_guru' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::user()->id)],
            'gelar' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
        ]);

        User::find(Auth::user()->id)->update($validasiForm);


        $guru->update($validasiForm);

        return redirect('edit-profile')->with('message', 'Update Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        //
        $guru->delete();

        User::find($guru->id_user)->delete();

        return redirect(route('guru-tampil'))->with('message', 'Hapus Berhasil');
    }

    public function updateAdmin(Request $request, Guru $guru)
    {
        //
        $validasiForm = $request->validate([
            'nip' => ['required', Rule::unique('guru')->ignore($guru)],
            'nama_guru' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($guru->id_user)],
            'gelar' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
        ]);

        User::find($guru->id_user)->update($validasiForm);

        $guru->update($validasiForm);

        return redirect(route('guru-tampil'))->with('message', 'Update Berhasil');
    }
}
