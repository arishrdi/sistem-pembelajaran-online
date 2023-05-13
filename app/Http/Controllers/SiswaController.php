<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('admin');
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::join('users', 'siswa.id_user', '=', 'users.id')->get();

        // dd($siswa);
        return view('pages.admin.tampil-siswa', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $id = User::latest()->first()->id + 1;
        $id = User::orderBy('id', 'DESC')->limit(1)->first()->id + 1;
        // dd($id);
        return view('pages.admin.tambah-siswa', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validasiForm = $request->validate([
            'nis' => 'required|unique:siswa',
            'id_user' => 'required',
            'nama_siswa' => 'required',
            'email' => 'required|email|unique:users',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
        ]);

        if ($validasiForm) {

            $user = User::create([
                'email' => $request['email'],
                'tipe' => 'siswa',
                'password' => Hash::make($request['email']),
            ]);

            $user->assignRole('siswa');
        }

        Siswa::create($validasiForm);

        // return redirect('admin');
        return redirect(route('siswa-tampil'))->with('message', 'Tambah Siswa Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
        $siswa = Siswa::join('users', 'siswa.id_user', '=', 'users.id')
            ->where('users.id', $siswa->id_user)
            ->get()->first();

        return view('pages.admin.edit-siswa', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
        $validasiForm = $request->validate([
            'nis' => 'required',
            'nama_siswa' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::user()->id)],
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
        ]);

        User::find(Auth::user()->id)->update($validasiForm);


        $siswa->update($validasiForm);

        // if (Auth::hasRole('admin')) {
        //     return redirect(route('siswa-tampil'));
        // }
        return redirect('edit-profile')->with('message', 'Update Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        //
        $siswa->delete();

        User::find($siswa->id_user)->delete();

        return redirect(route('siswa-tampil'))->with('message', 'Hapus Berhasil');

    }

    public function updateAdmin(Request $request, Siswa $siswa)
    {
        //
        $validasiForm = $request->validate([
            'nis' => ['required', Rule::unique('siswa')->ignore($siswa)],
            'nama_siswa' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($siswa->id_user)],
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
        ]);

        User::find($siswa->id_user)->update($validasiForm);

        $siswa->update($validasiForm);

        return redirect(route('siswa-tampil'))->with('message', 'Update Berhasil');
    }
}
