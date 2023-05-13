<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MapelSiswaController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/lupa-password', function () {
    return view('lupa-password');
});

Auth::routes();

if (Auth::check()) {
    Route::get('/', [HomeController::class, 'index'])->name('home');
} else {
    Route::get('/', function () {
        return view('welcome');
    });
}

Route::middleware('role:guru')->get('/guru', [HomeController::class, 'guru'])->name('guru');

Route::middleware('role:siswa')->get('/siswa', [HomeController::class, 'siswa'])->name('siswa');

Route::middleware('role:admin')->controller(HomeController::class)->group(function () {
    Route::get('admin', [HomeController::class, 'admin'])->name('admin');
    Route::post('admin', [HomeController::class, 'store'])->name('store');
    Route::put('admin/reset/{user}', 'resetPassword')->name('reset-password');
});

Route::middleware('auth')->controller(HomeController::class)->group(function () {
    Route::get('edit-profile/', 'edit')->name('edit-profile');
    Route::put('edit-profile/password', 'updatePassword')->name('update-password');
    Route::put('edit-profile/user', 'updateProfile')->name('update-profile');
});

Route::middleware('role:guru')->controller(GuruController::class)->group(function () {
    Route::put('edit-guru/{guru}', 'update')->name('update-guru');
});

Route::middleware('role:siswa')->controller(SiswaController::class)->group(function () {
    Route::put('edit-siswa/{siswa}', 'update')->name('update-siswa');
});

Route::middleware('role:admin')->controller(SiswaController::class)->group(function () {
    Route::get('admin/tambah-siswa', 'create')->name('siswa-tambah');
    Route::post('admin/siswa', 'store')->name('siswa-store');
    Route::get('admin/siswa', 'index')->name('siswa-tampil');
    Route::get('admin/{siswa}/edit/siswa', 'edit')->name('siswa-edit');
    Route::put('admin/{siswa}/edit/siswa', 'updateAdmin')->name('siswa-update-admin');
    Route::delete('admin/{siswa}/siswa', 'destroy')->name('siswa-delete');
});

Route::middleware('role:admin')->controller(GuruController::class)->group(function () {
    Route::get('admin/tambah-guru', 'create')->name('guru-tambah');
    Route::post('admin/guru', 'store')->name('guru-store');
    Route::get('admin/guru', 'index')->name('guru-tampil');
    Route::get('admin/{guru}/edit/guru', 'edit')->name('guru-edit');
    Route::put('admin/{guru}/edit/guru', 'updateAdmin')->name('guru-update-admin');
    Route::delete('admin/{guru}/guru', 'destroy')->name('guru-delete');
});

Route::middleware('role:guru')->controller(MataPelajaranController::class)->group(function () {
    Route::post('guru', 'store')->name('mapel-simpan');
    Route::delete('mapel/{mataPelajaran}', 'destroy')->name('mapel-delete');
    Route::put('mapel/{mataPelajaran}', 'update')->name('mapel-update');
});

Route::middleware('role:guru')->controller(MateriController::class)->group(function () {
    Route::get('materi/{id_mapel}', 'index')->name('materi');
    Route::get('materi/{id_mapel}/create', 'create')->name('materi-tambah');
    Route::post('materi', 'store')->name('materi-store');
    Route::get('materi/{id_mapel}/{materi}/edit', 'edit')->name('materi-edit');
    Route::put('materi/{materi}', 'update')->name('materi-update');
    Route::delete('materi/{materi}', 'destroy')->name('materi-delete');
});

Route::middleware('role:siswa')->controller(MapelSiswaController::class)->group(function () {
    Route::post('siswa', 'store')->name('gabung');
    Route::get('siswa/materi/{id_mapel}', 'show')->name('materi-siswa');
    Route::delete('siswa/{mapelSiswa}', 'destroy')->name('mapel-delete-siswa');
});
