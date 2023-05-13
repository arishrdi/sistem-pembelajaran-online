@extends('layouts.app')

@section('content')
<x-modal-gabung-mapel />

<div class="grid grid-cols-4 gap-8">

  @foreach ($mapelSiswa as $item)
  <div class="card border hover:shadow-lg transition-all duration-300">
    <a href="{{route('materi-siswa', ['id_mapel' => $item->id_mapel])}}" class="p-4">
      <p class="">
        {{$item->nama_guru}}, {{$item->gelar}}
      </p>
      <h1 class="card-title">
        {{$item->nama_mapel}} ({{$item->kelas}})
      </h1>
      <p class="flex w-full justify-between">
        <span>Kode : </span>
        <input type="text" class="font-bold disabled focus:outline-none flex-none" value="{{$item->kode}}"
          id="kode_kelas" readonly>
      </p>
    </a>
    <hr>
    <div class="card-actions justify-end p-2">
      <button id="copyText" data-copy="{{$item->kode}}" class="btn btn-circle btn-ghost tooltip" data-tip="Salin kode">
        <span class="material-symbols-outlined">
          content_copy
        </span>
      </button>
      <x-modal-hapus-mapel-siswa :mapel="$item" />
      {{-- <button class="btn btn-circle btn-ghost tooltip" data-tip="Hapus mapel">
        <span class="material-symbols-outlined">
          exit_to_app
        </span>
      </button> --}}
    </div>
  </div>
  @endforeach
</div>
@endsection