<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gulshan Socity') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- CSS -->
    @include('partials.styles')

    <!-- Each Page own CSS -->
    @yield('css')

    <!-- End CSS -->
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">

        <!-- START HEADER -->
        @include('partials.header')
        <!-- END HEADER -->
        <div class="container-fluid page-body-wrapper">
            {{-- @include('partials.messages') --}}

            <!-- START Slider -->
            @include('partials.sidebar')
            <!-- END Slider -->

            {{--
            <!-- START Slider -->
            @include('partials.slider')
            <!-- END Slider --> --}}

            <!-- Main Content -->
            @yield('content')
            <!-- End Main Content -->
            <!-- Page Content -->
            {{-- <main>
                {{ $slot }}
            </main> --}}

            <!-- START FOOTER -->
            {{-- @include('partials.footer') --}}
            <!-- END FOOTER -->
        </div>
    </div>

    {{-- Scripts --}}
    @include('partials.scripts')

    @stack('scripts')

    @yield('scripts')

</body>

</html>