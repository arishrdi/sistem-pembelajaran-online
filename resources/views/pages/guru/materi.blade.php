@extends('layouts.app')

@section('content')

<div class="text-sm breadcrumbs">
  <ul>
    <li><a href="/guru">Home</a></li>
    <li>{{$nama_mapel}}</li>
  </ul>
</div>

<a href="{{route('materi-tambah', ['id_mapel' => $id_mapel])}}" for="modal-tambah"
  class="btn btn-ghost gap-2 text-primary font-bold">
  <span class="material-symbols-outlined">
    add
  </span>
  Tambah Materi
</a>

@foreach ($listMateri as $item)
<div tabindex="0"
  class="collapse collapse-arrow border border-base-300 bg-base-100 rounded-box mb-4  hover:shadow-lg transition-all duration-300">
  <input type="checkbox" class="peer" />
  <div class="collapse-title text-xl font-medium peer-checked:bg-base-200 flex justify-between">
    {{$item->judul_materi}}
    <span class="text-sm">Diposting: {{$item->created_at}}</span>
  </div>
  <div class="collapse-content">
    <article class="my-3">{!!$item->isi_materi!!}</article>
    @if ($item->file)
    <a href="{{asset('storage/'.$item->file)}}" class="btn btn-primary" download>Download</a>
    @endif
    <hr class="my-2">
    <div class="flex justify-end">
      <a href="{{route('materi-edit', ['materi' => $item->id_materi, 'id_mapel' => $id_mapel])}}">
        <button class="btn btn-circle btn-ghost tooltip" data-tip="Edit">
          <span class="material-symbols-outlined">
            edit
          </span>
        </button>
      </a>
      <x-modal-hapus-materi :materi="$item" />
    </div>
  </div>
</div>
@endforeach
@endsection