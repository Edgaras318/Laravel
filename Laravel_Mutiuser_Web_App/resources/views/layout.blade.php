<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Bootstrap core CSS -->
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/css/modern-business.css" rel="stylesheet">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Post Your App Idea!</title>

</head>

<body>
<main class="py-4">
  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/">Post Your App</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

              </ul>
              <ul class="navbar-nav ml-auto">
                  {{-- <li class="{{Request::is('/') ? 'nav-item active' : ''}}">
                    <a class="nav-link" href="/">Home</a>
                  </li> --}}
                  @can('users-list')
                  <li class="{{Request::is('users') ? 'nav-item active' : ''}}">
                    <a class="nav-link" href="/users">Users</a>
                  </li>
                  @endcan
                  <li class="{{Request::is('blogs') ? 'nav-item active' : ''}}">
                    <a class="nav-link" href="/blogs/">Blogs</a>
                  </li>
                  @auth
                  <li class="{{Request::is('create') ? 'nav-item active' : ''}}">
                    <a class="nav-link" href="/blogs/create">Create Blog</a>
                  </li>
                  @endauth
                </ul>
              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                  <!-- Authentication Links -->
                  @guest
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                      </li>
                      @if (Route::has('register'))
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                      @endif
                  @else
                      <li class="nav-item dropdown">

                          <a style ="position:relative; padding-left:50px;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img style="width:32px; height:32px;  top:10px; left10px; border-radius:50%; " src="/uploads/avatars/{{Auth::user()->avatar}}">
                            {{ Auth::user()->name }} <span class="caret"></span>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="/user/profile")>
                               {{ __('Profile') }}
                           </a>
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                          </div>
                      </li>
                  @endguest
              </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">PostYourApp
      <small></small>
    </h1>

    <ol class="breadcrumb">
      {{-- <li class="breadcrumb-item">
        <a href="/">Home</a>
      </li> --}}
    <li class="breadcrumb-item active"><a href="/">Blogs</a></li>
    </ol>
    <h3> @include('includes.message') </h3>
@yield('content')

  <!-- Footer -->
  <br>
  <br>
  <br>
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; PostYourApp 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
