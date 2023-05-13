@extends('layouts.app')

@section('content')

<div class="text-sm breadcrumbs">
  <ul>
    <li><a href="/">Home</a></li>
    <li>{{$nama_mapel}}</li>
  </ul>
</div>

<h1 class="text-center">{{$nama_mapel}}</h1>
@forelse ($listMateri as $item)
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
  </div>
</div>

@empty
<p class="italic">Materi belum tersedia</p>
@endforelse

@foreach ($listMateri as $item)
@endforeach
@endsection