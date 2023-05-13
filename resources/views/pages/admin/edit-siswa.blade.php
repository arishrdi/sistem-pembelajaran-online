@php
$kelas = ['X','XI', 'XII', 'XIII'];
$jk = ['Laki-laki', 'Perempuan'];
$agama = ['Islam', 'Kristen', 'Hindu', 'Budha'];
@endphp

@extends('layouts.app')

@section('content')
<form action="{{route('siswa-update-admin', ['siswa' => $siswa->nis])}}" method="POST"
  class="w-[30rem] mx-auto border shadow-xl py-4 px-6">
  @method('PUT')
  @csrf
  <h2 class="text-center">Edit Siswa</h2>

  <label class="mt-3 label">
    NIS
  </label>
  <input type="text" name="nis" class="input input-secondary w-full" value="{{$siswa->nis}}">
  @error('nis')
  <label class="label">
    <span class="label-text-alt text-error">{{$message}}</span>
  </label>
  @enderror

  <label class="mt-3 label">
    Nama Siswa
  </label>
  <input type="text" name="nama_siswa" class="input input-secondary w-full" value="{{$siswa->nama_siswa}}">
  @error('nama_siswa')
  <label class="label">
    <span class="label-text-alt text-error">{{$message}}</span>
  </label>
  @enderror

  <label class="mt-3 label">
    E-mail
  </label>
  <input type="text" name="email" class="input input-secondary w-full" value="{{$siswa->email}}">
  @error('email')
  <label class="label">
    <span class="label-text-alt text-error">{{$message}}</span>
  </label>
  @enderror

  <label class="mt-3 label">
    Kelas
  </label>
  <select name="kelas" class="select select-bordered select-secondary w-full">
    <option selected disabled>Pilih kelas</option>
    @foreach ($kelas as $x)
    <option value=" {{$x}}" {{$siswa->kelas===$x ? 'selected' : '' }}>{{$x}}</option>
    @endforeach
  </select>
  @error('kelas')
  <label class="label">
    <span class="label-text-alt text-error">{{$message}}</span>
  </label>
  @enderror

  <label class="mt-3 label">
    Jenis Kelamin
  </label>
  <select name="jenis_kelamin" class="select select-bordered select-secondary w-full">
    <option selected disabled>Pilih jenis kelamin</option>
    @foreach ($jk as $x)
    <option value=" {{$x}}" {{$siswa->jenis_kelamin===$x ? 'selected' : '' }}>{{$x}}</option>
    @endforeach
  </select>
  @error('jenis_kelamin')
  <label class="label">
    <span class="label-text-alt text-error">{{$message}}</span>
  </label>
  @enderror

  <label class="mt-3 label">
    Agama
  </label>
  <select name="agama" class="select select-bordered select-secondary w-full">
    <option selected disabled>Pilih agama</option>
    @foreach ($agama as $x)
    <option value=" {{$x}}" {{$siswa->agama===$x ? 'selected' : '' }}>{{$x}}</option>
    @endforeach
  </select>
  @error('agama')
  <label class="label">
    <span class="label-text-alt text-error">{{$message}}</span>
  </label>
  @enderror

  <label class="mt-3 label">
    Tanggal lahir
  </label>
  <input type="date" name="tanggal_lahir" class="input input-secondary w-full" value="{{$siswa->tanggal_lahir}}">
  @error('tanggal_lahir')
  <label class="label">
    <span class="label-text-alt text-error">{{$message}}</span>
  </label>
  @enderror

  <label class="mt-3 label">
    Alamat
  </label>
  <textarea name="alamat" class="textarea textarea-secondary w-full" rows="3">{{$siswa->alamat}}</textarea>
  @error('alamat')
  <label class="label">
    <span class="label-text-alt text-error">{{$message}}</span>
  </label>
  @enderror
  <div class="card-actions justify-end my-3">
    <a href="/admin" type="submit" class="btn btn-error btn-outline">Kembali</a>
    <button type="submit" class="btn btn-primary">Update</button>
  </div>

</form>
@endsection