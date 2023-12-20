@extends('layouts.app')

@section('content')

    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('images/bg_5.png');"></div>
            <div class="contents order-2 order-md-1">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <div class="mb-4">
                            <h1>Login </h1>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group first">
                            <label for="email" class="font-weight-bold">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                        </div>
                        <div class="form-group last mb-3">
                            <label for="password" class="font-weight-bold">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex mb-5 align-items-center">
                            <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                            <input type="checkbox" checked="checked"/>
                            <div class="control__indicator"></div>
                            </label>
                            <span class="ml-auto"><a  href="{{ route('password.request') }}" class="forgot-pass">Forgot Password</a></span>
                        </div>

                        <input type="submit" value="Log In" class="btn btn-block btn-orange">

                        <div class="mt-2">
                            <span class="ml-auto pt-3">Don't have an account? <a  href="{{ route('register')  }}" class="forgot-pass">Sign up</a></span>

                        </div>


                        </form>
                    </div>
                    </div>
                </div>
            </div>
      </div>
    </div>
@endsection


