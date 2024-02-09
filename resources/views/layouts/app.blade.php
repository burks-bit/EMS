<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <title>EMS - @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fontawesome-free/css/all.min.css') }}">
</head>
<body>
    <div id="app">
        @include('includes.navbar')
        <div class="container">
            <main class="py-4">
                @yield('content')
            </main>
        </div>    
    </div>
    
    @yield('scripts')
</body>
</html>
