@extends('layouts.app')

@section('content')

<div class="text-sm breadcrumbs">
  <ul>
    <li><a href="/guru">Home</a></li> 
    <li><a href="{{route('materi', ['id_mapel' => $id_mapel])}}">{{$nama_mapel}}</a></li> 
    <li>Tambah materi</li>
  </ul>
</div>

<h1 class="text-3xl text-center">Tambah Materi</h1>
<form action="{{route('materi-store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="id_mapel" value="{{$id_mapel}}">
  <label class="mt-3 label">
    Judul materi
  </label>
  <input type="text" name="judul_materi" id="kelas" class="input input-secondary w-full"
    placeholder="Masukkan judul materi">
  @error('judul_materi')
  <span class="label-text-alt text-error">Judul wajib disi*</span>
  @enderror
  <label class="label mt-3">
    File
  </label>
  <input type="file" name="file" class="file-input file-input-primary file-input-bordered">
  <label class="mt-3 label">
    Isi materi
  </label>
  <textarea name="isi_materi" id="myeditorinstance">{{old('isi_materi')}}</textarea>
  <button type="submit" class="btn btn-primary w-full mt-3">
    Tambah
  </button>
</form>
@endsection