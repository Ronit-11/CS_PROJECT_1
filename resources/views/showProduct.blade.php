<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if(isset($CategoryName))
                    <div class="flex">
                        <x-nav-link href="{{ route('dashboard') }}" class="pr-0.2">Home ></x-nav-link>
                        <x-nav-link :href="route('servStart', ['category'=>$CategoryName])" class="pl-0 pr-0.2">{{ $CategoryName }}</x-nav-link>
                        @if(isset($Product))
                            <x-nav-link href="" class="pl-0 pr-0.2">> {{ $Product->name }}</x-nav-link>
                        @endif
                    </div>
                @endif

                    <div class="group">
                        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                            <img src="{{ URL($Product->image) }}" alt="{{ $Product -> name }}" class="h-full w-full object-cover object-center group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-xl font-semibold text-gray-900">{{ $Product -> name }}</h3>
                        <p class="mt-1 text-sm font-medium text-gray-800">KSh {{ $Product -> price }}</p>
                        <p class=' text-sm mt-1 font-medium text-gray-800'>{{ $Product -> description }}</p>
                    </div>
                {{--@include('components.welcome')--}}
                

            </div>
        </div>
    </div>
</x-app-layout>


