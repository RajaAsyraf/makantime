<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- Head -->
@include('layouts.head')

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <!-- Nagivations -->
            <div class="navbar-bg"></div>
            @include('layouts.navigation')
            @include('layouts.navigationSecondary')

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
            @include('layouts.footer')
        </div>
    </div>
    @include('layouts.bodyScripts')
</body>
</html>