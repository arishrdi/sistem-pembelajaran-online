@extends('layouts.app')

@section('content')
<div class="flex items-center flex-col lg:flex-row">
    <div class="card border w-5/6 lg:w-[30rem] mx-auto">

    </div>
    <div class="divider lg:divider-horizontal"></div>
    <div class="card border w-5/6 lg:w-[30rem] mx-auto">
        <form action="{{route('update-password')}}" class="card-body" method="POST">
            @method('PUT')
            @csrf
            <h2>Ganti password</h2>

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
            <input type="password" name="confirm_new_password" class="input input-bordered input-primary w-full"
                value="">
            @error('confirm_new_password')
            <label class="label">
                <span class="label-text-alt text-error">{{$message}}</span>
            </label>
            @enderror

            <div class="card-actions justify-end">
                <a href="/lupa-password" class="btn btn-link">Lupa password ?</a>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
        </form>
    </div>
</div>
{{-- {{$user}} --}}
@endsection