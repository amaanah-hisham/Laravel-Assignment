<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
{{--        @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
        <link rel="stylesheet" href="{{ asset('assets/css/vendors/bootstrap.min.css') }}">


        <!-- Styles -->
        @livewireStyles
    </head>
    <body class=" bg-light">



            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="d-flex py-3 bg-white shadow-sm border-bottom">
                    <div class="container">
                        {{ $header }}
                    </div>
                </header>

            @endif

            <!-- Page Content -->
            <main class="container my-5">
                {{ $slot }}


            </main>


          @if(request()->route()->getName() !== 'product.edit' &&
                request()->route()->getName() !== 'product.create' &&
                request()->route()->getName() !== 'dashboard' &&
                request()->route()->getName() !== 'rent-requests')
            <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}" defer/>
          @elseif(request()->route()->getName() === 'product.create')


          @endif


            @livewireScripts

            <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"/>



        @stack('modals')

            <script>
                // Wait for the DOM to be fully loaded
                document.addEventListener('DOMContentLoaded', function () {
                    // Initialize the accordion
                    var accordions = document.querySelectorAll('.accordion');
                    accordions.forEach(function (accordion) {
                        new bootstrap.Collapse(accordion);
                    });
                });
            </script>


    </body>
</html>
