@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="position-absolute top-50 start-50 translate-middle w-lg-500px px-10">
            <form class="card w-100 border border-gray-300 p-10" method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="text-center mb-10">
                    <h1 class="text-dark fw-bolder mb-2 ">{{ __('Confirm Password') }}</h1>
                    <div class="text-gray-500 fw-semibold fs-6">{{ __('Please confirm your password before continuing.') }}</div>
                </div>

                <div class="fv-row mb-10">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Your Password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="d-grid gap-5">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Confirm Password') }}
                    </button>

                    @if (Route::has('password.request'))
                    <a class="link-primary text-center" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
