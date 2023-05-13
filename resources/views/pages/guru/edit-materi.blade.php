@extends('layouts.app')

@section('content')

<h1 class="text-3xl text-center">Edit Materi</h1>
<form action="{{route('materi-update', ['materi' => $materi->id_materi])}}" method="POST" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  <input type="hidden" name="id_mapel" value="{{$id_mapel}}">
  <label class="mt-3 label">
    Judul materi
  </label>
  <input type="text" name="judul_materi" id="kelas" class="input input-secondary w-full"
    placeholder="Masukkan judul materi" value="{{$materi->judul_materi}}">
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
  <textarea name="isi_materi" id="myeditorinstance">{{$materi->isi_materi}}</textarea>
  <button type="submit" class="btn btn-primary w-full mt-3">
    Edit
  </button>
</form>
@endsection