@extends('layouts.app')

@section('content')
@if (Auth::guest())
<div class="container">
    <div class="row justify-content-center align-middle">
        <div class="col-md-8  align-items-center">
        <img src="https://via.placeholder.com/150/FF0000/FFFFFF/?Text=Proudr"  class=" mx-auto d-block rounded-0" alt="Proudr logo">

            <div class="card border-none border-0 bg-transparent">
                <div class="card-body border-light border-0 bg-transparent">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row justify-content-center">
                            <div class="col-md-8">
                                <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="password" id="password" class="form-control rounded-0 @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-8 ">
                                <button type="submit" class="mt-4 rounded-0 btn btn-lg btn-danger btn-block">
                                    {{ __('Sign in') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link mx-auto d-block" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                                @if (Route::has('register'))
                                    <a  class="mt-4 rounded-0 btn btn-lg btn-secondary btn-block" href="{{ route('register') }}">
                                        {{ __('Create an account') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection