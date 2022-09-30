<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>News | @yield('title') </title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('news/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('news/css/modern-business.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free/css/all.min.css') }}">

     <!-- favicon  -->
     <link rel="shortcut icon" href="{{ asset('cms/dist/img/favicon.png') }}" type="image/x-icon">

     <link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

     <!-- My File css -->
     <link rel="stylesheet" href="{{ asset('news/css/style.css') }}">
     <link rel="stylesheet" href="{{ asset('news/css/style-en.css') }}">
           <!-- nice select file  -->
    <link rel="stylesheet" href="{{ asset('news/css/nice-select.css') }}">

    @yield('style')

</head>

<body>

    @php
    use App\Models\Visitor;
    use App\Models\category;
    $categories = category::limit(3)->get();
    $visitors = Visitor::all();



    @endphp


<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('news.index') }}">NEWS</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('news.index') }}">Home</a>
                </li>
                @foreach ( $categories as $category )

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('all-news',$category->id) }}">{{ $category->name }}</a>
                </li>
                @endforeach


                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('all-news') }}">All News</a>
                </li> --}}


                <li class="nav-item">
                    <a class="nav-link" href="{{ route('news.contact') }}">Contact</a>
                </li>
                @if(Auth::guard('visitor')->id())




                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li> --}}
                <li>
                    <div class='header-right'>
                    <div class='avatar-wrapper' id='avatarWrapper'>
                        @if(Auth::user()->image == null)
                      {{-- <img alt='Profile Photo' class='avatar-photo' height='28' src="{{ asset('cms/dist/img/user1.svg') }}" width='28'> --}}
                      <div class="img-visitor-logo" style="background-image: url({{ asset('cms/dist/img/user1.svg') }})"></div>

                      @else
                      {{-- <img alt='Profile Photo' class='avatar-photo img-responsive' height='28' src="{{ asset('storage/images/visitor/'.Auth::user()->image) }}" width='28'> --}}
                      <div class="img-visitor-logo" style="background-image: url({{ asset('storage/images/visitor/'.Auth::user()->image) }})"></div>

                      @endif

                      <svg class='avatar-dropdown-arrow' height='24' id='dropdownWrapperArrow' viewbox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'>
                        <title>Dropdown Arrow</title>
                        <path d='M12 14.5c-.2 0-.3-.1-.5-.2l-3.8-3.6c-.2-.2-.2-.4-.2-.5 0-.1 0-.3.2-.5.3-.3.7-.3 1 0l3.3 3.1 3.3-3.1c.2-.2.5-.2.8-.1.3.1.4.4.4.6 0 .2-.1.4-.2.5l-3.8 3.6c-.1.1-.3.2-.5.2z'></path>
                      </svg>
                    </div>
                    <div class='dropdown-wrapper' id='dropdownWrapper' style='width: 256px'>
                      <div class='dropdown-profile-details'>
                        @if(Auth::user()->image == null)
                        {{-- <img alt='Profile Photo' class='avatar-photo' height='28' src="{{ asset('cms/dist/img/user1.svg') }}" width='28'> --}}
                        <div class="img-visitor" style="background-image: url({{ asset('cms/dist/img/user1.svg') }})"></div>

                        @else
                        {{-- <img alt='Profile Photo' class='avatar-photo img-responsive'  height='28' src="{{ asset('storage/images/visitor/'.Auth::user()->image) }}" width='28'> --}}
                        <div class="img-visitor" style="background-image: url({{ asset('storage/images/visitor/'.Auth::user()->image) }})"></div>

                        @endif

                            {{-- <img class="img-circle img-bordered-sm" src="{{ asset('storage/images/admin/'.$admin->user->image) }}" width="50" height="50" alt="User Image"> --}}


                        <span class='dropdown-profile-details--name'>{{ auth('visitor')->user()->full_name }}</span>
                        {{-- @foreach($visitors as $visitor)
                        @if (Auth::guard('visitor')->id() == $visitor->id)
                        <span class='dropdown-profile-details--email'>{{ $visitor->email  }}</span>
                        @endif
                        @endforeach --}}

                        <span class='dropdown-profile-details--email'>{{ Auth::user()->email  }}</span>

                      </div>
                      <div class='dropdown-links'>
                        <a href='{{ route('profile.visitor') }}'>Profile</a>
                        <a href='{{ route('update_Profile_visitor' , Auth::guard('visitor')->id()) }}'> Edit profile</a>
                        <a href='{{ route('news.edit-password') }}'> Edit password</a>
                        <a href='{{ route('logout') }}'>Sign out</a>
                      </div>
                    </div>
                  </div>
                  </li>
                  @else
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                  @endif




            </ul>
        </div>
    </div>
</nav>

@yield('content')

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; {{ now()->year }} - {{ now()->year +1 }}   All rights reserved.</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('news/js/jquery.js') }}"></script>
<script src="{{ asset('news/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('news/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('cms/js/crud.js') }}"></script>
<script src="{{ asset('cms/plugins/toastr/toastr.min.js') }}"></script>
<!-- nice select file  -->
<script src="{{ asset('news/js/jquery.nice-select.min.js') }}"></script>

<!-- my file js and jquery  -->
<script src="{{ asset('news/js/custom-en.js') }}"></script>
<script src="{{ asset('news/js/custom.js') }}"></script>

<script>

    // for nice select

    $(document).ready(function(){
    $('select').niceSelect();
    });
    </script>
@yield('scripts')


</body>

</html>
