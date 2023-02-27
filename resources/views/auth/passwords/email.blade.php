@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="position-absolute top-50 start-50 translate-middle w-lg-500px px-10">
            <form class="card w-100 border border-gray-300 p-10" method="POST" action="{{ route('password.email') }}">
                @csrf

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="text-center mb-10">
                    <h1 class="text-dark fw-bolder mb-2 ">{{ __('Reset Password') }}</h1>
                    <div class="text-gray-500 fw-semibold fs-6">Masukkan alamat email yang Anda gunakan untuk membuat akun Anda. Kami
                        akan mengirimkan email pengaturan ulang kata sandi.</div>
                </div>

                <div class="fv-row mb-10">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Your Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="d-grid gap-5">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
