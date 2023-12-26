@extends('layouts.app')

@section('content')

<div class="wrapper">
    <!-- Sidebar  -->
  <x-SideBar/>

    <!-- Page Content  -->
    <div id="content">
        <button type="button" id="sidebarCollapse" class="btn btn-orange">
            <i class="fas fa-align-left"></i>
        </button>

        <div class="title-line">
            <h3 class="page-title ">Profile</h3>
        </div>
        <div>
            @include('inc.messages')
        </div>
        <div class="container">

            <div class="general-form">
                <form class="mx-5" method="POST" action="{{ route('user.update', $user) }}" enctype='multipart/form-data' novalidate>
                    @csrf
                    @method('PUT')
                    <div class="row align-items-center justify-content-center">
                        <label class="image" for="picture__input" tabIndex="0">
                            <span class="picture__image" id='picture__image'>
                                @if (file_exists(public_path() . '/storage/users_images/' .  $user->image) &&
                                        $user->image)
                                        <img src="{{ url('storage/users_images/' . $user->image) }} "
                                            class="picture__img" alt=" Avatar">
                                    @else
                                        <img src="{{ url('storage/users_images/defaul_user_img.png') }} " class="picture__img" alt=" Avatar">
                                    @endif
                            </span>
                          </label>

                          <input type="file"  accept="image/*" name="user_image" id="picture__input" class="form-control @error('user_image') is-invalid @enderror"  value="" required autocomplete="avatar">

                          @error('user_image')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                    </div>


                    <div class="form-group first">
                        <span style='color:red'>*</span>
                        <label for="name" class="font-weight-bold">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>


                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group last mb-3">
                        <label for="email" class="font-weight-bold" >{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control " name="email" value="{{ $user->email }}" readonly >
                    </div>

                    <div class="form-group last mb-3">

                        <label for="password" class="font-weight-bold">{{ __('Password') }}</label>

                        <input id="password" value="" placeholder="To keep current password, leave it blank" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group last mb-3">

                        <label for="password-confirm" class="font-weight-bold">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" value="" placeholder="To keep current password, leave it blank"  type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                    </div>

                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-end">
                        <input type="submit" value="Save" class="btn px-5 btn-purple">

                        </div>

                    </div>


                </form>
            </div>
        </div>

    </div>
</div>
<script src="{{ asset('js/image_profile.js') }}"></script>
@endsection


