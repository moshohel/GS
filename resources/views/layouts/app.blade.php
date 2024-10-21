<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gulshan Society') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- CSS -->
    @include('partials.styles')

    <link rel="stylesheet" href={{ asset("assets/vendors/select2/select2.min.css") }}>
    <link rel="stylesheet" href={{ asset("assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css") }}>

    <!-- Each Page own CSS -->
    @yield('css')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

</head>

<body class="font-sans antialiased">
@livewireScripts
<div class="bg-gray-100">

    @include('partials.header')
    <div class="container-fluid page-body-wrapper">

        @include('partials.sidebar')


        {{ $slot }}

    </div>
</div>
{{-- Scripts --}}
@include('partials.scripts')


<script src={{asset("assets/vendors/select2/select2.min.js")}}></script>
<script src={{asset("assets/vendors/typeahead.js/typeahead.bundle.min.js")}}></script>


</body>

</html>
