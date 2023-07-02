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
            <nav x-data="{ open: false }" class="w-full fixed bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <x-application-mark class="block h-9 w-auto" />
                            </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6" >
                            <!-- right nav items -->
                            <div class="ml-3 inline-flex">
                                <!-- Cart ICON -->

                                    <div class="font-sans block align-middle text-orange hover:text-gray-700">
                                        <a href="#" role="button" class="relative flex margin-top-2_5">
                                            <svg class="flex-1 w-7 h-7 fill-indigo-500" viewbox="0 0 24 24">
                                                <path d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z"/>
                                            </svg>
                                            <span class="absolute right-0 top-0 rounded-full bg-indigo-600 w-4 h-4 top right p-0 m-0 text-white font-mono text-sm  leading-tight text-center">5</span>
                                        </a>
                                    </div>
                                    <div class="text-right sm:right-0 items-center flex">
                                        <a href="{{ route('login') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                        @endif
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </nav>

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
