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
            <h3 class="page-title ">My Posts</h3>
        </div>
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 d-flex align-items-center justify-content-end">
                    <a href="{{ route('posts.create') }}" type="button"  class="btn btn-purple">

                        <svg xmlns="http://www.w3.org/2000/svg" style="color:#fff" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                        </svg>
                        Add post
                      </a>
                </div>
            </div>

            @foreach ($posts as $post)
            <div class="card mb-3" >
                <div class="row g-0">
                  <div class="col-lg-2 col-md-4 col-sm-4">
                    @if (file_exists(public_path() . '/storage/posts_images/' . $post->image) &&
                    $post->image)
                        <img src="{{ url('storage/posts_images/' .  $post->image) }} "
                            class="post-img" alt=" Avatar">
                    @else
                        <img src="{{ url('storage/posts_images/default-image.jpg') }} "    class="post-img" alt=" Avatar">
                    @endif


                  </div>
                  <div class="col-lg-9 col-md-6 col-sm-6">
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->title }}</h5>
                      <span class="card-text crop">{{ $post->description }}</span>
                      <div class="card-text mt-2">
                        @php
                        $diff_in_Minutes = $now->diffInMinutes($post->created_at);
                        $diff_in_hours = $now->diffInHours($post->created_at);
                        $diff_in_days = $now->diffInDays($post->created_at);
                        @endphp
                        <small class="text-muted  ">
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
                  <div class=" col-lg-1 col-md-2 col-sm-2 d-flex align-items-center justify-content-center">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" style="color:#E38569" width="19" height="19" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                          </svg>
                    </a>
                  </div>
                </div>
              </div>
            @endforeach


        </div>

    </div>
</div>
@endsection


