@extends('layouts.app')

@section('content')
<a href="{{route('guru-tambah')}}" class="btn btn-primary mb-3">
  <span class="material-symbols-outlined">
    add
  </span>
  Tambah
</a>

<div class="overflow-x-auto">
  <table class="display" id="myTable">
    <thead>
      <tr>
        <th>NIP</th>
        <th>Nama</th>
        {{-- <th>Kelas</th> --}}
        <th>Agama</th>
        <th>Tgl Lahir</th>
        <th>Alamat</th>
        <th class="w-32"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($guru as $item)
      <tr>
        <td>{{$item->nip}}</td>
        <td>
          <b>
            {{$item->nama_guru .", ". $item->gelar}}
          </b>
          <br>
          <span class="badge badge-outline badge-primary">
            {{$item->email}}
          </span>
        </td>
        {{-- <td>{{$item->kelas}}</td> --}}
        <td>{{$item->agama}}</td>
        <td>{{$item->tanggal_lahir}}</td>
        <td>{{$item->alamat}}</td>
        <td>
          <a href="{{route('guru-edit', ['guru'=> $item->nip])}}" class="btn btn-warning btn-sm">edit</a>
          <x-modal-hapus :id="$item->nip" :nama="$item->nama_guru">
            <form action="{{route('guru-delete', ['guru' => $item->nip])}}" method="POST">
              @method('DELETE')
              @csrf
          </x-modal-hapus>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection