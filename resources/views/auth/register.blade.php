@extends('layouts.app')

@section('content')
<div class="">
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background-image: url(images/big/auth-bg.jpg);background-repeat: no-repeat;background-color: rgb(246 247 242);background-position: right center;background-size:cover;">
        <div class="auth-box">
            <div class="card">
                <div class="logo">
                        <span class="db"><h2>{{ __('Register') }}</h2></span>
                        <!-- <h5 class="font-medium mb-3">Login</h5> -->
                    </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" class="form-horizontal mt-3">
                        @csrf

                        <div class="form-group row ">
                            <div class="col-12 ">
                                <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row ">
                            <div class="col-12 ">
                                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row ">
                            <div class="col-12 ">
                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row ">
                            <div class="col-12 ">
                                <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            </div>
                        </div>

                        <div class="form-group mb-0 mt-2 row">
                             <div class="col-sm-12 text-center ">
                                <button type="submit" class="btn btn-block btn-lg btn-info ">
                                    {{ __('Register') }}
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
