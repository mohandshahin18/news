<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CMS NEWS | @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('cms/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/summernote/summernote-bs4.min.css') }}">

     <!-- favicon  -->
     <link rel="shortcut icon" href="{{ asset('cms/dist/img/favicon.png') }}" type="image/x-icon">

  {{-- <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css"> --}}
  <link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" href="{{ asset('news/css/style.css') }}">


             <!-- nice select file  -->
             <link rel="stylesheet" href="{{ asset('news/css/nice-select.css') }}">
  @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('cms/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li>
            @can('Create-Article')
            @if (Auth::guard('author')->id())
            <a href="{{ route('create-article') }}" type="button" class="btn btn-primary">Add New Article </a>
            @endif
            @endcan

          </li>

      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('cms/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('cms/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> --}}


    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('news.index') }}" class="brand-link">
      <img src="{{ asset('cms/dist/img/news-logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">NEWS SYSTEM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">

          @if (Auth::guard('admin')->id())
          @if (auth('admin')->user()->image !='')
          {{-- <img class="brand-image img-circle elevation-3" src="{{ asset('storage/images/admin/' . auth('admin')->user()->image) }}"alt="User Image"> --}}
          <div class="img-visitor-logo-cms" style="background-image: url({{ asset('storage/images/admin/'.Auth::user()->image) }})"></div>

          @else
          {{-- <img class="brand-image img-circle img-bordered-sm img-responsive " src="{{ asset('cms/dist/img/user1.svg') }}"alt="User Image"> --}}
          <div class="img-visitor-logo-cms" style="background-image: url({{ asset('cms/dist/img/user1.svg') }})"></div>

          @endif
       @endif


       @if (Auth::guard('author')->id())
        @if (auth('author')->user()->image !='')
        {{-- <img class="brand-image img-circle elevation-3 " src="{{ asset('storage/images/author/' . auth('author')->user()->image) }}"alt="User Image"> --}}
        <div class="img-visitor-logo-cms" style="background-image: url({{ asset('storage/images/author/'.Auth::user()->image) }})"></div>

        @else
        {{-- <img class="brand-image img-circle img-bordered-sm img-responsive " src="{{ asset('cms/dist/img/user1.svg') }}"alt="User Image"> --}}
        <div class="img-visitor-logo-cms" style="background-image: url({{ asset('cms/dist/img/user1.svg') }})"></div>

        @endif
        @endif
        </div>


        <div class="info">
            @if (Auth::guard('admin')->id())
            <a href="{{ route('profile') }}" class="d-block"> {{ auth('admin')->user()->full_name }}</a>
            @elseif (Auth::guard('author')->id())
            <a href="{{ route('profile') }}" class="d-block"> {{ auth('author')->user()->full_name }}</a>
            @else
            <a href="#" class="d-block"> users</a>

            @endif
        </div>

      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link @yield('dashboard_active') ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>

          </li>

          @canAny(['Index-Role','Create-Role' , 'Index-Permission' , 'Create-Permission'])

          <li class="nav-header">Role & Permission</li>

          <li class="nav-item @yield('role_open')">
            <a href="#" class="nav-link @yield('role_active')">
              <i class="nav-icon fas fa-user-check"></i>
              <p>
                Role
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item ">
                <a href="{{ route('roles.index') }}" class="nav-link @yield('role-index-active')">
                  <i class="fas fa-list nav-icon"></i>
                  <p>index</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{ route('roles.create') }}" class="nav-link @yield('roles-create_active')">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item @yield('permission_open')">
            <a href="#" class="nav-link @yield('permission_active')">
              <i class="nav-icon fas fa-users"></i>
              {{-- <i class="fad fa-users"></i> --}}
              <p>
                Permission
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item ">
                <a href="{{ route('permissions.index') }}" class="nav-link @yield('permission-index-active')">
                  <i class="fas fa-list nav-icon"></i>
                  <p>index</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{ route('permissions.create') }}" class="nav-link @yield('permission-create_active')">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
            </ul>
          </li>

@endcanAny



          @canany(['Index-Admin' , 'Create-Admin' , 'Index-Author' , 'Create-Author' ])

          <li class="nav-header">User Manegment</li>
          @canany(['Index-Admin' , 'Create-Admin'])
          <li class="nav-item @yield('admin_open')">
            <a href="#" class="nav-link @yield('admin_active')">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Admin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

                @can('Index-Admin')
              <li class="nav-item ">
                <a href="{{ route('admins.index') }}" class="nav-link @yield('admin-index-active')">
                  <i class="fas fa-list nav-icon"></i>
                  <p>index</p>
                </a>
              </li>
              @endcan

              @can('Create-Admin')
              <li class="nav-item ">
                <a href="{{ route('admins.create') }}" class="nav-link @yield('admin-create_active')">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              @endcan

            </ul>
          </li>
          @endcanany




          @canany(['Index-Author' , 'Create-Author'])

          <li class="nav-item @yield('author_open')">
            <a href="#" class="nav-link @yield('author_active')">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Author
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                @can('Index-Author')
              <li class="nav-item ">
                {{-- <a href="{{ route('authors.index') }}" class="nav-link @yield('author-index_active')"> --}}
                    @if (Auth::guard('admin')->id())
                    <a href="{{ route('authors.index')}}" class="nav-link @yield('author-index_active') ">
                    @elseif(Auth::guard('author')->id())
                    <a href="{{ route('index-author')}}" class="nav-link @yield('author-index_active') ">
                    @endif
                  <i class="fas fa-list nav-icon"></i>
                  <p>index</p>
                </a>
              </li>
              @endcan
              @can('Create-Author')

              <li class="nav-item ">
                <a href="{{ route('authors.create') }}" class="nav-link @yield('author-create_active')">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>

              @endcan

            </ul>
          </li>
          @endcanany

          @endcanany


          @canany(['Index-Country' , 'Create-Country' , 'Index-City' , 'Create-City' , 'Index-Article' , 'Create-Article'])
          <li class="nav-header">Resourse Manegment</li>

          @canany(['Index-Country' , 'Create-Country'])
          <li class="nav-item">
            <a href="#" class="nav-link @yield('country_active')">
            <i class="nav-icon fas fa-flag"></i>
            <p>
                Country
                <i class="fas fa-angle-left right"></i>
            </p>
            </a>

            <ul class="nav nav-treeview">
                @can('Index-Country')
                <li class="nav-item">
                    <a href="{{ route('countries.index')}}" class="nav-link ">
                        <i class="fas fa-list nav-icon"></i>
                        <p>index</p>
                    </a>
                </li>
                @endcan

                @can('Create-Country')
                <li class="nav-item">
                    <a href="{{ route('countries.create') }}" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>Create</p>
                    </a>
                </li>
                @endcan

            </ul>
        </li>
          @endcanany



          @canany(['Index-City' , 'Create-City'])
          <li class="nav-item  @yield('city_open')" >
            <a href="#" class="nav-link @yield('city_active')">
              <i class="nav-icon fas fa-city"></i>
              <p>
                City
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                @can('Index-City')
              <li class="nav-item">
                <a href="{{ route('cities.index')}}" class="nav-link @yield('city-index-active') ">
                    <i class="fas fa-list nav-icon"></i>
                    <p>index</p>
                </a>
              </li>
              @endcan
              @can('Create-City')
              <li class="nav-item">
                <a href="{{ route('cities.create') }}" class="nav-link @yield('city-create_active')">
                    <i class="fas fa-plus nav-icon"></i>
                    <p>Create</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcanany

          @canany(['Index-Category' , 'Create-Category'])
          <li class="nav-item @yield('category_open')">
            <a href="#" class="nav-link @yield('category_active')">
              <i class="nav-icon fas fa-stream"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                @can('Index-Category')
              <li class="nav-item ">
                <a href="{{ route('categories.index') }}" class="nav-link @yield('category-index-active')">
                  <i class="fas fa-list nav-icon"></i>
                  <p>index</p>
                </a>
              </li>
              @endcan

              @can('Create-Category')
              <li class="nav-item ">
                <a href="{{ route('categories.create') }}" class="nav-link @yield('category-create_active')">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              @endcan

            </ul>
          </li>
          @endcanany




          @canany(['All-Article'])
          <li class="nav-item  @yield('article_open')" >
            <a href="#" class="nav-link @yield('article_active')">
              <i class="nav-icon fas fa-newspaper"></i>
              <i class=""></i>
              <p>
                Article
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                @can('Index-Article')
              <li class="nav-item">
                <a href="{{ route('articles.index')}}" class="nav-link @yield('article-index-active') ">
                    <i class="fas fa-list nav-icon"></i>
                    <p>index all article</p>
                </a>
              </li>
              @endcan



              @if (Auth::guard('author')->id())
              <li class="nav-item">
                <a href="{{ route('indexArticle' ,Auth::guard('author')->id() )}}" class="nav-link @yield('my-article-index-active') ">
                    <i class="fas fa-list nav-icon"></i>
                    <p>index my article</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('create-article')}}" class="nav-link @yield('article-create_active') ">
                    <i class="fas fa-plus nav-icon"></i>
                    <p>Create</p>
                </a>
              </li>

              @endif

            </ul>
          </li>
          @endcanany

          @endcanany


          {{-- @canany(['All-Article']) --}}
          <li class="nav-item  @yield('slider_open')" >
            <a href="#" class="nav-link @yield('slider_active')">
              <i class="nav-icon fas fa-regular fa-image"></i>
              <i class=""></i>
              <p>
                Slider
                <i class="fas fa-angle-left right"></i>
                {{-- <i class="fa-regular fa-image"></i> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
                {{-- @can('Index-Article') --}}
              <li class="nav-item">
                <a href="{{ route('sliders.index')}}" class="nav-link @yield('slider-index-active') ">
                    <i class="fas fa-list nav-icon"></i>
                    <p>index</p>
                </a>
              </li>
              {{-- @endcan --}}

              {{-- @if (Auth::guard('author')->id()) --}}

              <li class="nav-item">
                <a href="{{ route('sliders.create')}}" class="nav-link @yield('slider-create_active') ">
                    <i class="fas fa-plus nav-icon"></i>
                    <p>Create</p>
                </a>
              </li>

              {{-- @endif --}}

            </ul>
          </li>
          {{-- @endcanany

          @endcanany --}}


            <li class="nav-item  @yield('message_open')" >
                <a href="#" class="nav-link @yield('message_active')">
                  <i class="nav-icon fas fa-envelope"></i>
                  <i class=""></i>
                  <p>
                    Message
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('contacts.index')}}" class="nav-link @yield('message-index-active') ">
                        <i class="fas fa-list nav-icon"></i>
                        <p>index</p>
                    </a>
                  </li>



                </ul>
              </li>
              {{-- @endcanany

              @endcanany --}}





          <li class="nav-header">Setting</li>
          <li class="nav-item">
            @if (Auth::guard('admin')->id())
            <a href="{{ route('edit-profile-admin') }}" class="nav-link  @yield('profile_active')">
            @elseif(Auth::guard('author')->id())
            <a href="{{ route('edit-profile-author') }}" class="nav-link  @yield('profile_active')">
            @endif
              <i class="nav-icon fas fa-edit"></i>
              <p class="text">Edit Profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('edit-password') }}" class="nav-link @yield('passwoed_active')" >
              <i class="nav-icon fas fa-key"></i>
              <p>Change Password</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('cms.auth.logout') }}" class="nav-link" >
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>LogOut</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('main-title')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">@yield('sub-title')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    @yield('content')

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; {{ now()->year }} - {{ now()->year +1 }} <a href="{{ route('news.index') }}">{{ env('APP_NAME') }}</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> {{ env('APP_VERSION') }}
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('cms/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('cms/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('cms/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('cms/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('cms/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('cms/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('cms/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('cms/plugins/moment/moment.min.js') }}"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('cms/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('cms/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('cms/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('cms/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('cms/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('cms/dist/js/pages/dashboard.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('cms/js/crud.js') }}"></script>
<script src="{{ asset('cms/plugins/toastr/toastr.min.js') }}"></script>

<!-- my file js and jquery  -->
<script src="{{ asset('news/js/custom-en.js') }}"></script>

{{-- /////////// --}}
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


<!-- nice select file  -->
<script src="{{ asset('news/js/jquery.nice-select.min.js') }}"></script>
<script>

// for nice select

$(document).ready(function(){
$('select').niceSelect();
});
</script>

@yield('scripts')

</body>
</html>
