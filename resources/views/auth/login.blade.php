@extends('layouts.app')

@section('content')
<div class="card w-96 bg-base-100 shadow-xl mx-auto p-10 border">
    <div class="">
        <div class="">
            <div class="">
                <h2 class="text-center">{{ __('Login') }}</h2>

                <div class="">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="">
                            <label for="email" class="">{{ __('Alamat E-mail')
                                }}</label>

                            <div class="">
                                <input id="email" type="email" class="input input-bordered input-primary w-full @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="text-error" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" my-3">
                            <label for="password" class="">{{ __('Password')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="input input-bordered input-primary w-full @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <div class="">
                                <div class="flex items-center gap-3">
                                    <input class="checkbox checkbox-primary" type="checkbox" name="remember" id="remember" {{
                                        old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <div class="">
                                <button type="submit" class="btn btn-primary w-full">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="/lupa-password">
                                    {{ __('Lupa password??') }}
                                </a>
                                {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a> --}}
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection