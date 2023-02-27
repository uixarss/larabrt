@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="position-absolute top-50 start-50 translate-middle w-lg-500px px-10">
            <form class="card w-100 border border-gray-300 p-10" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="text-center mb-10">
                    <h1 class="text-dark fw-bolder mb-2 ">{{ __('Register') }}</h1>
                    <div class="text-gray-500 fw-semibold fs-6">Sudah punya akun? <a href="{{ route('login') }}" class="link-primary">Masuk</a></div>
                </div>

                <div class="fv-row mb-5">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Your name">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="fv-row mb-5">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Your email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="fv-row mb-5">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="fv-row mb-10">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confrim Password">
                </div>

                <div class="d-grid gap-5">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
