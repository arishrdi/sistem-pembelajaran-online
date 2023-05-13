@php
$kelas = ['X','XI', 'XII', 'XIII'];
$jk = ['Laki-laki', 'Perempuan'];
$agama = ['Islam', 'Kristen', 'Hindu', 'Budha'];
@endphp

@extends('layouts.app')

@section('content')
<div class="flex flex-col lg:flex-row">
  <div class="card border w-5/6 lg:w-[30rem] mx-auto">
    <form action="{{route('update-siswa', ['siswa' => $user->nis])}}" method="POST" class="w-[30rem] mx-auto py-4 px-6">
      @method('PUT')
      @csrf
      <h2 class="text-center">Edit Profile</h2>

      {{-- <input type="hidden" name="id_user" value="{{$id}}"> --}}

      <label class="mt-3 label">
        NIS
      </label>
      <input type="text" name="nis" class="input input-secondary w-full" value="{{$user->nis}}" readonly>
      @error('nis')
      <label class="label">
        <span class="label-text-alt text-error">{{$message}}</span>
      </label>
      @enderror

      <label class="mt-3 label">
        Nama Siswa
      </label>
      <input type="text" name="nama_siswa" class="input input-secondary w-full" value="{{$user->nama_siswa}}">
      @error('nama_siswa')
      <label class="label">
        <span class="label-text-alt text-error">{{$message}}</span>
      </label>
      @enderror

      <label class="mt-3 label">
        E-mail
      </label>
      <input type="text" name="email" class="input input-secondary w-full" value="{{$user->email}}">
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
        <option value=" {{$x}}" {{$user->kelas===$x ? 'selected' : '' }}>{{$x}}</option>
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
        <option value=" {{$x}}" {{$user->jenis_kelamin===$x ? 'selected' : '' }}>{{$x}}</option>
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
        <option value=" {{$x}}" {{$user->agama===$x ? 'selected' : '' }}>{{$x}}</option>
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
      <input type="date" name="tanggal_lahir" class="input input-secondary w-full" value="{{$user->tanggal_lahir}}">
      @error('tanggal_lahir')
      <label class="label">
        <span class="label-text-alt text-error">{{$message}}</span>
      </label>
      @enderror

      <label class="mt-3 label">
        Alamat
      </label>
      <textarea name="alamat" class="textarea textarea-secondary w-full" rows="3">{{$user->alamat}}</textarea>
      @error('alamat')
      <label class="label">
        <span class="label-text-alt text-error">{{$message}}</span>
      </label>
      @enderror
      <div class="card-actions justify-end my-3">
        <a href="/siswa" type="submit" class="btn btn-error btn-outline">Kembali</a>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>

    </form>
  </div>
  <div class="divider lg:divider-horizontal"></div>
  <div class="card border w-5/6 lg:w-[30rem] mx-auto h-min">
    <form action="{{route('update-password')}}" class="card-body" method="POST">
      @method('PUT')
      @csrf
      <h2>Update password</h2>

      <label class="font-semibold">Password saat ini</label>
      <input type="password" name="old_password" class="input input-bordered input-primary w-full" value="">
      @error('old_password')
      <label class="label">
        <span class="label-text-alt text-error">{{$message}}</span>
      </label>
      @enderror

      <label class="font-semibold">Password baru</label>
      <input type="password" name="new_password" class="input input-bordered input-primary w-full" value="">
      @error('new_password')
      <label class="label">
        <span class="label-text-alt text-error">{{$message}}</span>
      </label>
      @enderror

      <label class="font-semibold">Konfirmasi password</label>
      <input type="password" name="confirm_new_password" class="input input-bordered input-primary w-full" value="">
      @error('confirm_new_password')
      <label class="label">
        <span class="label-text-alt text-error">{{$message}}</span>
      </label>
      @enderror

      <div class="card-actions justify-end">
        <a href="/lupa-password" class="btn btn-link">Lupa password ?</a>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>
</div>
{{-- {{$user}} --}}
@endsection