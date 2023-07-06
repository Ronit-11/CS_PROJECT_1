<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SERV</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

    </head>
    <body class="font-sans antialiased">

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <main>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-16">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            @include('components.welcome')
                            {{-- @include is used to parse the product array to subcomponent
                            <x-welcome />--}}
                        </div>
                    </div>
                </div>
            </main>
        </div>

    @stack('modals')

    @livewireScripts
    </body>
</html>
