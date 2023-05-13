@extends('layouts.app')

@section('content')
<x-modal-tambah-mapel />
<h1 class="text-center">Daftar Kelas</h1>

<div class="grid grid-cols-4 gap-8">
  @foreach ($mapel as $item)
  <div class="card border hover:shadow-lg transition-all duration-300">
    <a href="{{route('materi', ['id_mapel' => $item->id_mapel])}}" class="p-4">
      <h1 class="card-title">
        {{$item->nama_mapel}} ({{$item->kelas}})
      </h1>
      <p>Kode :
        <input type="text" class="font-bold disabled focus:outline-none" value="{{$item->kode}}" id="kode_kelas"
          readonly>
      </p>
    </a>
    <hr>
    <div class="card-actions justify-end p-2">
      <button id="copyText" data-copy="{{$item->kode}}" class="btn btn-circle btn-ghost tooltip" data-tip="Salin kode">
        <span class="material-symbols-outlined">
          content_copy
        </span>
      </button>
      <x-modal-edit-mapel :mapel="$item" />
      <x-modal-hapus-mapel :mapel="$item" />
    </div>
  </div>
  @endforeach
</div>

<script>


</script>

@endsection