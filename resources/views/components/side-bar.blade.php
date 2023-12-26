
    <nav id="sidebar">
        <div class="sidebar-header ">
            <img class="head-logo" src="{{ asset('images/logo_w.png') }}" alt="logo">
            <span class="ml-3 head-app-name">Posts App</span>
        </div>

        <ul class="list-unstyled components ">
            <div class="text-center mb-3">
                @if (file_exists(public_path() . '/storage/users_images/' . auth()->user()->image) &&
                    auth()->user()->image)
                    <img src="{{ url('storage/users_images/' . auth()->user()->image) }} "
                        class="user-img" alt=" Avatar">
                @else
                      <img src="{{ url('storage/users_images/defaul_user_img.png') }} " class="user-img" alt=" Avatar">
                @endif
                    {{ auth()->user()->name }}
            </div>
            <div style="  border-bottom: 1px solid rgb(107, 127, 137);"></div>


            <li>
                <a class="link" href="{{ route('dashboard.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg"class="mb-1 mr-1" width="20" height="20" fill="currentColor" class="bi bi-exclude" viewBox="0 0 16 16">
                        <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2zm12 2H5a1 1 0 0 0-1 1v7h7a1 1 0 0 0 1-1z"/>
                    </svg>
                    Dashboard</a>
            </li>


            <li >

                <a  href="{{ route('posts.index') }}"  class="link">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mb-1 mr-1" width="20" height="20" fill="currentColor" class="bi bi-filter-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="M7 11.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5"/>
                    </svg>
                    Posts</a>
            </li>

            <li >

                <a href="{{ route('user.edit' , auth()->user()) }}" class="link">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mb-1 mr-1" width="20" height="20"  fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg>
                    Portfolio
                </a>
            </li>

            <li >
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                               <svg xmlns="http://www.w3.org/2000/svg" class="mb-1 mr-1" width="20" height="20" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                                <path d="M7.5 1v7h1V1z"/>
                                <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812"/>
                              </svg>
                 {{ __('Logout') }}
             </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

            </li>
        </ul>

    </nav>

