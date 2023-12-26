@extends('layouts.app')

@section('content')

<div class="wrapper">
    <!-- Sidebar  -->
  <x-SideBar>

  </x-SideBar>
    <!-- Page Content  -->
    <div id="content">
        <button type="button" id="sidebarCollapse" class="btn btn-orange">
            <i class="fas fa-align-left"></i>
        </button>

        <div class="title-line">
            <h3 class="page-title ">Show Post</h3>
        </div>
        <div >
            @include('inc.messages')
        </div>
        <div class="container post-content" >

                        <div class="row heder-form" >
                            <div class="col-md-6 d-flex align-items-center justify-content-start">
                                <div class="text-center">
                                    @if (file_exists(public_path() . '/storage/users_images/' .  $post->user->image) &&
                                        $post->user->image)
                                        <img src="{{ url('storage/users_images/' . $post->user->image) }} "
                                            class="user-img" alt=" Avatar">
                                    @else
                                        <img src="{{ url('storage/users_images/defaul_user_img.png') }} " class="user-img" alt=" Avatar">
                                    @endif
                                    {{ $post->user->name }}
                                    @if ($post->user->id == auth()->user()->if )
                                    <small>You</small>

                                    @endif

                                </div>
                            </div>
                            @can('delete' , $post)
                            <div class="col-md-6 d-flex align-items-center justify-content-end">
                                <form id="delete-post-form" action="{{ route('posts.destroy' , $post) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a  onclick="delete_post(event)"  class="btn btn-sm btn-danger" style="color: #fff" >

                                        <svg xmlns="http://www.w3.org/2000/svg" style="color:#fff" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                        </svg>
                                        Delete this post
                                    </a>
                                </form>
                            </div>
                            @endcan
                        </div>

                        <div class="row mb-5 " >
                            <div class="col-md-12 d-flex align-items-center justify-content-end">
                                <div class="card-text mt-2">
                                    @php
                                    $diff_in_Minutes = $now->diffInMinutes($post->created_at);
                                    $diff_in_hours = $now->diffInHours($post->created_at);
                                    $diff_in_days = $now->diffInDays($post->created_at);
                                    @endphp
                                    <small class="text-muted">
                                      Befor
                                            @if ($diff_in_Minutes < 60)
                                            {{ $diff_in_Minutes }} minutes
                                            @elseif($diff_in_hours < 24)
                                            {{  $diff_in_hours }} hours
                                            @else
                                            {{  $diff_in_days }} days
                                            @endif
                                    </small>
                                </div>
                            </div>

                        </div>

                        <div class="row align-items-center justify-content-center" >
                            <label class="image-post" for="picture__input" tabIndex="0">
                                <span class="" id='picture__image'>
                                    @if (file_exists(public_path() . '/storage/posts_images/' . $post->image) && $post->image)
                                        <img src="{{ url('storage/posts_images/' .  $post->image) }} "
                                            class="image-post" alt=" Avatar">
                                    @else
                                        <img src="{{ url('storage/posts_images/default-image.jpg') }} "    class="image-post" alt=" Avatar">
                                    @endif
                                </span>
                              </label>

                        </div>

                        <div class="row m-5">
                            <div class="col-12">
                                <div class="p-color mb-3">
                                    <h4>{{ $post->title }}</h4>
                                </div>

                                <p class="p-description">{{ $post->description }}</p>
                            </div>


                        </div>
                        {{-- footer --}}
                        <h5 class="o-color ml-2"> Comments </h5>

                            <div class="row form-footer ">
                                <div class="col-md-12 comment-content-scroll">
                                    @foreach ($comments as $comment)
                                    <div class="col-12">
                                        <div class="card card-comment">
                                            <div class="card-body ">
                                                <div class="row ">
                                                        <div class="col-md-3 d-flex  justify-content-start">
                                                            <div class="row">

                                                                <div class="col-md-4">
                                                                        @if (file_exists(public_path() . '/storage/users_images/' .  $comment->user->image) &&
                                                                            $comment->user->image)
                                                                            <img src="{{ url('storage/users_images/' . $comment->user->image) }} "
                                                                                class="user-img-comment" alt=" Avatar">
                                                                        @else
                                                                            <img src="{{ url('storage/users_images/defaul_user_img.png') }} " class="user-img-comment" alt=" Avatar">
                                                                        @endif

                                                                </div>
                                                                <div class="col-md-8">
                                                                    <small>
                                                                        {{ $comment->user->name }}
                                                                        @if ($comment->user->id == auth()->user()->id )
                                                                        You

                                                                        @endif
                                                                    </small>

                                                                    @php
                                                                    $diff_in_Minutes = $now->diffInMinutes($post->created_at);
                                                                    $diff_in_hours = $now->diffInHours($post->created_at);
                                                                    $diff_in_days = $now->diffInDays($post->created_at);
                                                                    @endphp
                                                                    <h6 class="comment-time">
                                                                            @if ($diff_in_Minutes < 60)
                                                                            {{ $diff_in_Minutes }} minutes
                                                                            @elseif($diff_in_hours < 24)
                                                                            {{  $diff_in_hours }} hours
                                                                            @else
                                                                            {{  $diff_in_days }} days
                                                                            @endif
                                                                    </small>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <div class="col-md-8 d-flex align-items-center justify-content-start">
                                                                {{ $comment->description }}
                                                        </div>

                                                        <div class="col-md-1 d-flex align-items-center justify-content-end">
                                                            @can('delete' , $comment)
                                                                <form id="delete-comment-form" action="{{ route('comments.destroy' , $comment) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <a  onclick="delete_comment(event)"  class="btn btn-sm btn-light" style="color: #fff" >

                                                                        <svg xmlns="http://www.w3.org/2000/svg" style="color:red" width="12" height="12" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                                        </svg>
                                                                    </a>
                                                                </form>
                                                                @endcan
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="row form-footer ">

                                <div class="col-12">
                                    <form  method="POST" action="{{ route('comments.store') }}"  novalidate >
                                        @csrf
                                        @csrf

                                        <div class="input-group">
                                            <input id="comment" type="text" class="form-control @error('comment') is-invalid @enderror" name="comment" value="{{ old('comment') }}" required autocomplete="comment" placeholder="write your comment here .." >
                                            <input name="postId" type="text" class="form-control" hidden value="{{ $post->id }}" >


                                            @error('comment')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                            <div class="input-group-prepend">
                                                <input type="submit" value="Send" class="btn btn-purple">
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        {{-- footer --}}



        </div>

    </div>
</div>
<script src="{{ asset('js/delete.js') }}"></script>
@endsection


