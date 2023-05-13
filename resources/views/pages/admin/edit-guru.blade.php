@php
$kelas = ['X','XI', 'XII', 'XIII'];
$jk = ['Laki-laki', 'Perempuan'];
$agama = ['Islam', 'Kristen', 'Hindu', 'Budha'];
@endphp

@extends('layouts.app')

@section('content')
<form action="{{route('guru-update-admin', ['guru' => $guru->nip])}}" method="POST"
  class="w-[30rem] mx-auto border shadow-xl py-4 px-6">
  @method('PUT')
  @csrf
  <h2 class="text-center">Edit Guru</h2>

  {{-- <input type="hidden" name="id_user" value="{{$id}}"> --}}

  <label class="mt-3 label">
    NIP
  </label>
  <input type="text" name="nip" class="input input-secondary w-full" value="{{$guru->nip}}">
  @error('nip')
  <label class="label">
    <span class="label-text-alt text-error">{{$message}}</span>
  </label>
  @enderror

  <label class="mt-3 label">
    Nama Guru
  </label>
  <input type="text" name="nama_guru" class="input input-secondary w-full" value="{{$guru->nama_guru}}">
  @error('nama_guru')
  <label class="label">
    <span class="label-text-alt text-error">{{$message}}</span>
  </label>
  @enderror

  <label class="mt-3 label">
    E-mail
  </label>
  <input type="text" name="email" class="input input-secondary w-full" value="{{$guru->email}}">
  @error('email')
  <label class="label">
    <span class="label-text-alt text-error">{{$message}}</span>
  </label>
  @enderror

  <label class="mt-3 label">
    Gelar
  </label>
  <input type="text" name="gelar" class="input input-secondary w-full" value="{{$guru->gelar}}">
  @error('gelar')
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
    <option value=" {{$x}}" {{$guru->jenis_kelamin === $x ? 'selected': ''}}>{{$x}}</option>
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
    <option value=" {{$x}}" {{$guru->agama === $x ? 'selected': ''}}>{{$x}}</option>
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
  <input type="date" name="tanggal_lahir" class="input input-secondary w-full" value="{{$guru->tanggal_lahir}}">
  @error('tanggal_lahir')
  <label class="label">
    <span class="label-text-alt text-error">{{$message}}</span>
  </label>
  @enderror

  <label class="mt-3 label">
    Alamat
  </label>
  <textarea name="alamat" class="textarea textarea-secondary w-full" rows="3">{{$guru->alamat}}</textarea>
  @error('alamat')
  <label class="label">
    <span class="label-text-alt text-error">{{$message}}</span>
  </label>
  @enderror
  <div class="card-actions justify-end my-3">
    <a href="{{route('guru-tampil')}}" type="submit" class="btn btn-error btn-outline">Kembali</a>
    <button type="submit" class="btn btn-primary">Update</button>
  </div>

</form>
@endsection