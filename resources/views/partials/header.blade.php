<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Job board HTML-5 Template </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="site.webmanifest">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

  <!-- CSS here -->
  <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/flaticon.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/price_rangs.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/slicknav.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/fontawesome-all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/nice-select.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

  @yield('extra-js')
</head>

<body>
  <!-- Preloader Start -->
  <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
      <div class="preloader-inner position-relative">
        <div class="preloader-circle"></div>
        <div class="preloader-img pere-text">
          <img src="{{ asset('/img/logo/logo.png') }}" alt="">
        </div>
      </div>
    </div>
  </div>
  <!-- Preloader Start -->
  <header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
      <div class="headder-top header-sticky">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-3 col-md-2">
              <!-- Logo -->
              <div class="logo">
                <a href="/"><img src="{{ asset('/img/logo/logo.png') }}" alt="logo"></a>
              </div>
            </div>
            <div class="col-lg-9 col-md-9">
              <div class="menu-wrapper">
                <!-- Main-menu -->
                <div class="main-menu">
                  <nav class="d-none d-lg-block">
                    <ul id="navigation">
                      <li><a href="/">Home</a></li>
                      <li><a href="{{ route('jobs.listing') }}">Find a Job </a></li>
                      <li><a href="{{ route('employer.dashboard') }}">For employers </a></li>
                    </ul>
                  </nav>
                </div>
                <!-- Header-btn -->
                <div class="header-btn d-none f-right d-lg-block">

                  @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                      {{-- @auth --}}
                      @if (auth()->user() ||
                          auth()->guard('employer')->user())
                        <li class="nav-item dropdown no-arrow">
                          <a
                            class="dropdown-toggle"
                            href="#"
                            id="userDropdown"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                            <b><i class="fas fa-user"></i>
                              {{ auth()->user()->name ??auth()->guard('employer')->user()->name }}</b>
                          </a>
                          <!-- Dropdown - User Information -->
                          <div
                            class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#"
                              onclick="event.preventDefault();
                                                              document.getElementById('logout-form').submit();">
                              <i
                                class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                              {{ __('Logout') }}
                            </a>
                            <form id="logout-form"
                              action="{{ auth()->guard('employer')->check()? route('employer.logout'): route('logout') }}"
                              method="{{ auth()->guard('employer')->check()? 'GET': 'POST' }}"
                              style="display: none;">
                              @csrf
                            </form>
                          </div>
                        </li>
                      @else
                        <a href="{{ route('login') }}" class="btn head-btn2">Login</a>

                        @if (Route::has('register'))
                          <a href="{{ route('register') }}" class="btn head-btn2">Register</a>
                        @endif
                        {{-- @endauth --}}
                      @endif
                    </div>
                  @endif
                </div>
              </div>
            </div>
            <!-- Mobile Menu -->
            <div class="col-12">
              <div class="mobile_menu d-block d-lg-none"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Header End -->
  </header>
  @if (session()->has('errorDoubleLogin'))
    <div class="alert alert-danger text-center" style="width: 60%;margin: auto;">
      {{ session('errorDoubleLogin') }}
    </div>
  @endif
