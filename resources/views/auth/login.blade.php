@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="position-absolute top-50 start-50 translate-middle w-lg-500px px-10">
            <form class="card w-100 border border-gray-300 p-10" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="text-center mb-10">
                    <h1 class="text-dark fw-bolder mb-2 ">{{ __('Selamat datang kembali') }}</h1>
                    <div class="text-gray-500 fw-semibold fs-6">Belum punya akun? <a href="{{ route('register') }}" class="link-primary">Daftar sekarang</a></div>
                </div>

                <div class="fv-row mb-5">
                    <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Alamat Email" autocomplete="email" autofocus />
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="fv-row mb-5">
                    <input id-"passwords" type="password" name="password" class="form-control @error('password') is-invalid @enderror" autocomplete="current-password" placeholder="Password" />
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-10">
                    <div>
                        <div class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label text-gray-700" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-5">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Masuk') }}
                    </button>

                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="link-primary text-center">Lupa Kata Sandi Anda?</a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
