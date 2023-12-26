@extends('layouts.app')

@section('content')

<div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/bg_5.png');"></div>
        <div class="contents order-2 order-md-1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <div class="mb-4">
                            <h1>Sign Up </h1>
                        </div>

                        <form method="POST" action="{{ route('register') }}" enctype='multipart/form-data' >
                            @csrf
                            <div class="row align-items-center justify-content-center">
                                <label class="image" for="picture__input" tabIndex="0">
                                    <span class="picture__image" id='picture__image'></span>
                                  </label>

                                  <input type="file"  accept="image/*" name="user_image" id="picture__input" class="form-control @error('user_image') is-invalid @enderror"  value="{{ old('user_image') }}" required autocomplete="avatar">

                                  @error('user_image')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                            </div>


                            <div class="form-group first">
                                <span style='color:red'>*</span>
                                <label for="name" class="font-weight-bold">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>


                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group last mb-3">
                                <span style='color:red'>*</span>
                                <label for="email" class="font-weight-bold" >{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group last mb-3">
                                <span style='color:red'>*</span>
                                <label for="password" class="font-weight-bold">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group last mb-3">
                                <span style='color:red'>*</span>
                                <label for="password-confirm" class="font-weight-bold">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <input type="submit" value="Sign Up" class="btn btn-block btn-orange">

                            <div class="mt-2">
                                <span class="ml-auto pt-3"> Already have an account? <a  href="{{ route('login')  }}" class="forgot-pass">Login</a></span>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
  </div>
</div>

    <script src="{{ asset('js/image.js') }}"></script>
@endsection


