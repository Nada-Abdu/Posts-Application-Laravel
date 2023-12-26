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
            <h3 class="page-title ">New Post</h3>
        </div>
        <div class="container">

            <div class="general-form">
                <form  method="POST" action="{{ route('posts.store') }}" enctype='multipart/form-data' novalidate >
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row align-items-center justify-content-center">
                                <label class="image-post" for="picture__input" tabIndex="0">
                                    <span class="picture__image" id='picture__image'></span>
                                  </label>

                                  <input type="file"  accept="image/*" name="image" id="picture__input" class="form-control @error('image') is-invalid @enderror"  value="{{ old('image') }}" required focusable>

                                  @error('image')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group last mb-3">
                                <span style='color:red'>*</span>
                                <label for="title" class="font-weight-bold" >{{ __('Title') }}</label>
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required >

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group first">
                                <span style='color:red'>*</span>
                                <label for="description" class="font-weight-bold">{{ __('Description') }}</label>
                                <textarea id="description" name="description" rows="9"  class="form-control @error('description') is-invalid @enderror"  value="{{ old('description') }}" required ></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>



                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-end">
                        <input type="submit" value="Post" class="btn px-5 btn-purple">

                        </div>

                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
<script src="{{ asset('js/image.js') }}"></script>
@endsection


