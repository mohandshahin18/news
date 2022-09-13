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


     <!-- favicon  -->
     <link rel="shortcut icon" href="{{ asset('cms/dist/img/favicon.png') }}" type="image/x-icon">

     <link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

     <!-- My File css -->
     <link rel="stylesheet" href="{{ asset('news/css/style.css') }}">
     <link rel="stylesheet" href="{{ asset('news/css/style-en.css') }}">
           <!-- my owl carousel file  -->
    <link rel="stylesheet" href="{{ asset('news/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('news/css/owl.theme.default.min.css') }}">

    @yield('style')

</head>

<body>

    @php
    use App\Models\category;
    $categories = category::limit(3)->get();


    @endphp


<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('news.index') }}">news</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('news.index') }}">home</a>
                </li>
                @foreach ( $categories as $category )

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('all-news',$category->id) }}">{{ $category->name }}</a>
                </li>
                @endforeach

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('news.contact') }}">Contact</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

@yield('content')

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Momen Sisalem 2018</p>
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
<!-- my owl carousel file  -->
<script src="{{ asset('news/js/owl.carousel.min.js') }}"></script>

<!-- my file js and jquery  -->
<script src="{{ asset('news/js/custom-en.js') }}"></script>
<script src="{{ asset('news/js/custom.js') }}"></script>


@yield('scripts')


</body>

</html>
