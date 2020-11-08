@extends('auth.layout')

@section('content')
<h4 class="text-center mb-4">Sign in your account</h4>

<form method="POST" action="{{ route('login') }}">
    @csrf

    {{-- email --}}
    <div class="form-group">
        <label class="mb-1"><strong>{{ __('E-Mail Address') }}</strong></label>
        <input type="email" class="form-control @error('email') error @enderror" id="email" name="email"
            value="{{ old('email') }}" required autocomplete="off" autofocus>

        @error('email')
        <span class="error text-danger">
            <small>{{ $message }}</small>
        </span>
        @enderror
    </div>

    {{-- password --}}
    <div class="form-group">
        <label class="mb-1"><strong>{{ __('Password') }}</strong></label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" required autocomplete="off">
    </div>

    {{-- checkbox --}}
    <div class="form-row d-flex justify-content-between mt-4 mb-2">
        <div class="form-group">
            <div class="custom-control custom-checkbox ml-1">
                <input class="custom-control-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                <label class="custom-control-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>
        <div class="form-group">
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
            @endif
        </div>
    </div>

    {{-- button --}}
    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
    </div>
</form>

@if (Route::has('register'))
<div class="new-account mt-3">
    <p>Don't have an account? <a class="text-primary" href="{{ route('register') }}">Sign up</a></p>
</div>
@endif
@endsection
