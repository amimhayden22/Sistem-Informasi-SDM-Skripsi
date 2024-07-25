<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title') &mdash; Sistem Informasi SDM PT Sadasa Akademi Indonesia</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name='robots' content='noindex, nofollow' />

  <link rel="icon" type="image/png" sizes="192x192" href="https://sadasa.id/frontend/assets/images/icon/android-icon-192x192.png">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome-free-5.7.2-web/css/all.min.css') }}">

  <!-- CSS Libraries -->
  @yield('style-libraries')

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.min.css') }}">

  <!-- CSS Custom -->
  @yield('style')
  <style>
    html{
      scroll-behavior: smooth;
    }
    #myBtn {
      display: none;
      position: fixed;
      bottom: 30px;
      right: 50px;
      z-index: 99;
    }
  </style>
</head>

<body class="{{ (request()->is('dashboard/work-from-home/clickup')) ? 'sidebar-mini' : '' }} }}">
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>

      @include('dashboard-layouts.navbar')
      @include('dashboard-layouts.sidebar')

      <!-- Main Content -->
      <div class="main-content">
         @yield('content')
      </div>

      <!-- kaki -->
      @include('dashboard-layouts.footer')

    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>


  <!-- JS Libraies -->
  @yield('script-libraies')

  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

  <!-- Page Specific JS File -->
  @yield('script-page-specific')

  <!-- Custom Script-->
  @yield('script')
</body>
</html>

