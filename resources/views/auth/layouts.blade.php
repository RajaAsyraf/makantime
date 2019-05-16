<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Authenticate &mdash; {{ config('app.name') }}</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('theme/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('theme/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('theme/modules/bootstrap-social/bootstrap-social.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('theme/css/components.css') }}">
</head>

<body>
    <div id="app">
        @yield('content')
    </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('theme/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('theme/modules/popper.js') }}"></script>
  <script src="{{ asset('theme/modules/tooltip.js') }}"></script>
  <script src="{{ asset('theme/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('theme/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('theme/modules/moment.min.js') }}"></script>
  <script src="{{ asset('theme/js/stisla.js') }}"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="{{ asset('theme/js/scripts.js') }}"></script>
  <script src="{{ asset('theme/js/custom.js') }}"></script>
</body>
</html>