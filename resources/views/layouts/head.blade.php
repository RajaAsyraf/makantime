<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ config('app.name') }}</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('theme/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('theme/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  @yield('additionalLibrary')

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('theme/css/components.css') }}">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>