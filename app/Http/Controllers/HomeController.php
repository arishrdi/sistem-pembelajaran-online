<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\MataPelajaran;
use App\Models\Siswa;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            $adminCount = User::where('tipe', 'admin')->count();
            $siswaCount = Siswa::count();
            $guruCount = Guru::count();

            $users = User::all();

            return view('pages.admin.index', compact('users', 'adminCount', 'guruCount', 'siswaCount'));
        } elseif (auth()->user()->hasRole('guru')) {
            $mapel = MataPelajaran::all()->where('id_guru', '=', auth()->id());
            return view('pages.guru.index', compact('mapel'));
        } elseif (auth()->user()->hasRole('siswa')) {
            $mapelSiswa = MataPelajaran::join('users', 'mata_pelajaran.id_guru', '=', 'users.id')
                ->join('mapel_siswa', 'mata_pelajaran.id_mapel', '=', 'mapel_siswa.id_mapel')
                ->join('guru', 'mata_pelajaran.id_guru', '=', 'guru.id_user')
                ->where('mapel_siswa.id_siswa', auth()->id())
                ->get()
                ->unique('kode');
            return view('pages.siswa.index', ['mapelSiswa' => $mapelSiswa]);
        } else {
            return view('welcome');
        }

    }
    public function guru()
    {
        $mapel = MataPelajaran::all()->where('id_guru', '=', auth()->id());
        return view('pages.guru.index', compact('mapel'));
    }
    public function siswa()
    {
        $mapelSiswa = MataPelajaran::join('users', 'mata_pelajaran.id_guru', '=', 'users.id')
            ->join('mapel_siswa', 'mata_pelajaran.id_mapel', '=', 'mapel_siswa.id_mapel')
            ->join('guru', 'mata_pelajaran.id_guru', '=', 'guru.id_user')
            ->where('mapel_siswa.id_siswa', auth()->id())
            ->get()
            ->unique('kode');

        return view('pages.siswa.index', ['mapelSiswa' => $mapelSiswa]);
    }

    public function admin()
    {
        $adminCount = User::where('tipe', 'admin')->count();
        $siswaCount = Siswa::count();
        $guruCount = Guru::count();

        $users = User::all();

        return view('pages.admin.index', compact('users', 'adminCount', 'guruCount', 'siswaCount'));
    }

    public function store(Request $request)
    {

        $user = User::create([
            'name' => $request['nama_siswa'],
            'email' => $request['email'],
            'tipe' => $request['tipe'],
            'password' => Hash::make($request['email']),
        ]);

        $user->assignRole($request['tipe']);

        return redirect('/');
    }

    public function edit()
    {

        if (Auth::user()->tipe === 'guru') {
            $user = Guru::join('users', 'users.id', '=', 'guru.id_user')
                ->where('guru.id_user', Auth::user()->id)
                ->get()->first();
            return view('pages.guru.edit-profile', compact('user'));
        } elseif (Auth::user()->tipe === 'siswa') {
            $user = Siswa::join('users', 'users.id', '=', 'siswa.id_user')
                ->where('siswa.id_user', Auth::user()->id)
                ->get()->first();
            return view('pages.siswa.edit-profile', compact('user'));
        }

        return redirect('/');
    }

    public function updateProfile(Request $request)
    {

        $request->validate([]);

        $updateUser =  $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::user()->id)],
        ]);

        User::find(Auth::user()->id)->update($updateUser);
        return redirect(route('edit-profile', ['user' => Auth::user()->id]))->with('message', 'Profil berhasil diubah!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'min:8'],
            'confirm_new_password' => ['same:new_password']
        ]);

        User::find(Auth::user()->id)->update(['password' => Hash::make($request->new_password)]);

        return redirect(route('edit-profile', ['user' => Auth::user()->id]))->with('message', 'Password berhasil diubah!');
    }

    public function resetPassword(User $user)
    {
        $user->update([
            'password' => Hash::make($user->email)
        ]);

        return redirect('/admin')->with('message', 'Password <b>' . $user->name . '</b> berhasil direset');
    }
}
