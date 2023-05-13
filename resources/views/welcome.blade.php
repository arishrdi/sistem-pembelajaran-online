@extends('layouts.app')

@section('content')
{{-- <div class="text-center pt-32 m-0" style="background: url(assets/bg.svg) no-repeat center"> --}}
<div class="text-center pt-32">
    <h3>Selamat Datang di Website Pembelajaran Online</h3>
    <h1>SMK N 5 Surakarta</h1>
    @if (!auth()->user())
    <a href="/login" class="btn btn-outline btn-primary btn-lg mt-5">Login</a>
    @elseif (auth()->user()->hasRole('guru'))
    <a href="/guru" class="btn btn-outline btn-primary btn-lg mt-5">Home</a>
    @elseif (auth()->user()->hasRole('admin'))
    <a href="/admin" class="btn btn-outline btn-primary btn-lg mt-5">Home</a>
    @elseif (auth()->user()->hasRole('siswa'))
    <a href="/siswa" class="btn btn-outline btn-primary btn-lg mt-5">Home</a>
    @endif
</div>
@endsection