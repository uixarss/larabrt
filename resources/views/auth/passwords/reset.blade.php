@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="position-absolute top-50 start-50 translate-middle w-lg-500px px-10">
            <form class="card w-100 border border-gray-300 p-10" method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="text-center mb-10">
                    <h1 class="text-dark fw-bolder mb-2 ">{{ __('Reset Password') }}</h1>
                    <div class="text-gray-500 fw-semibold fs-6">Lorem</div>
                </div>

                <div class="fv-row mb-5">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="fv-row mb-5">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New Password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="fv-row mb-10">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>
                <div class="d-grid gap-5">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
