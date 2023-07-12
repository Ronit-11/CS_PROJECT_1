<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{--@if(isset($CategoryName))
                    <div class="flex">
                        <x-nav-link href="{{ route('servStart') }}" class="pr-0.2">
                            Home >
                        </x-nav-link>
                        <x-nav-link href="" class="pl-0 pr-0.2">
                            {{$CategoryName }}
                        </x-nav-link>
                    </div>
                @endif
                @include('components.welcome')--}}

                @livewire('show-product-modal')
                    {{--@include('livewire.show-product-modal')--}}
                {{-- @include is used to parse the product array to subcomponent
                <x-welcome />--}}
            </div>
        </div>
    </div>
</x-app-layout>

