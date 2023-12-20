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
            <div class="row mb-3">
                <div class="col-12 d-flex align-items-center justify-content-end">
                    <a href="#" type="button"  class="btn btn-purple">

                        <svg xmlns="http://www.w3.org/2000/svg" style="color:#fff" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                        </svg>
                        Add post
                      </a>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection


