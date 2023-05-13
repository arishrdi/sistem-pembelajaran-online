@extends('layouts.app')

@section('content')

<h1 class="font-normal">Menu</h1>
<div class="grid grid-cols-3 gap-10">
  <a href="{{route('admin')}}"
    class="card bg-gradient-to-br from-error to-red-600  text-white hover:shadow-xl transition-all duration-300 ease-in py-2 px-5">
    <span class="material-symbols-outlined">
      admin_panel_settings
    </span>
    <h2>Admin +</h2>
    <p>Jumlah: {{$adminCount}}</p>
  </a>
  <a href="{{route('guru-tampil')}}"
    class="card bg-gradient-to-br from-info to-blue-600 text-white hover:shadow-xl transition-all duration-300 ease-in py-2 px-5">
    <span class="material-symbols-outlined">
      school
    </span>
    <h2>Guru +</h2>
    <p>Jumlah: {{$guruCount}}</p>
  </a>
  <a href="{{route('siswa-tampil')}}"
    class="card  bg-gradient-to-br from-base-200 to-gray-400  hover:shadow-xl transition-all duration-300 ease-in py-2 px-5">
    <span class="material-symbols-outlined">
      group
    </span>
    <h2>Siswa +</h2>
    <p>Jumlah: {{$siswaCount}}</p>
  </a>
</div>

<hr class="mt-10">
<h1 class="font-normal text-center">Daftar User</h1>
<div class="overflow-x-auto pb-10">
  <table class="table w-96 mx-auto shadow-lg display" id="myTable">
    <thead>
      <tr>
        <th></th>
        <th>Email</th>
        <th>#</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $key => $user)
      <tr class="hover">
        <th>{{$key + 1}}</th>
        <td>
          {{$user->email}}
          <br />
          <span
            class="badge badge-sm {{$user->tipe === 'admin' ? 'badge-error' : ($user->tipe === 'guru' ? 'badge-info' : 'badge-ghost')}}">{{$user->tipe}}
          </span>
        </td>
        <td>
          <form action="{{route('reset-password', ['user' => $user->id])}}" method="POST">
            @method('PUT')
            @csrf
            <button class="btn btn-sm">Reset password</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection