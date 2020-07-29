@extends('layouts.app')

@section('content')
<div class="">
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background-image: url(images/big/auth-bg.jpg);background-repeat: no-repeat;background-color: rgb(246 247 242);background-position: right center;background-size:cover;">
        <div class="auth-box">
            <div class="card">
                <div class="logo">
                        <span class="db"><h2>Login</h2></span>
                        <!-- <h5 class="font-medium mb-3">Login</h5> -->
                    </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Username" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="custom-control-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>

                                @if (Route::has('password.request'))
                                    <a class="text-dark float-right" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-0 mt-2 row">
                             <div class="col-sm-12 text-center ">
                                <button type="submit" class="btn btn-block btn-lg btn-info">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
