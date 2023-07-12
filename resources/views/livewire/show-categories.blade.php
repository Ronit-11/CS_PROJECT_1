{{--<div>
<x-dropdown-link :href="route('servStart')" wire:click.prevent="selectcategory(0)">All</x-dropdown-link>
@foreach($categories as $category)
    <x-dropdown-link :href="route('servStart', ['category'=>$category->category_name])" wire:click.prevent="selectcategory({{ $category->id }})">
        {{ $category->categoryName }}
    </x-dropdown-link>
@endforeach
</div>--}}



{{--<div class="pt-2 pb-3 space-y-1">
    <x-responsive-nav-link href="{{ route('dashboard') }}" --}}{{--:active="request()->routeIs('dashboard')--}}{{-- wire:click.prevent="selectcategory(0)">
        {{ __('Dashboard') }}
    </x-responsive-nav-link>
    <div class="flex items-center border-l-4 border-transparent">
        <x-dropdownLeft align="center" width="48" class="origin-top-left">
            <x-slot name="trigger">
                                <span class="rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-900 bg-white hover:text-indigo-600 focus:outline-none focus:text-indigo-600 active:text-indigo-600 transition ease-in-out duration-150">
                                        Categories
                                    </button>
                                </span>
            </x-slot>
            <x-slot name="content">
                <div>
                    <x-dropdown-link :href="route('servStart')" wire:click.prevent="selectcategory(0)">All</x-dropdown-link>
                    @foreach($categories as $category)
                        <x-dropdown-link :href="route('servStart', ['category'=>$category->category_name])" wire:click.prevent="selectcategory({{ $category->id }})">
                            {{ $category->categoryName }}
                        </x-dropdown-link>
                    @endforeach
                </div>
            </x-slot>
        </x-dropdownLeft>
    </div>
</div>--}}



<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    @if(Auth::User())
        <x-nav-link href="{{ route('servStart') }}" wire:click.prevent="selectcategory(0)">
            {{ __('Dashboard') }}
        </x-nav-link>
    @endif

    <div class="flex items-center">
        <x-dropdownLeft align="center" width="48" class="origin-top-left">
            <x-slot name="trigger">
                <span class="rounded-md">
                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-900 bg-white hover:text-indigo-600 focus:outline-none focus:text-indigo-600 active:text-indigo-600 transition ease-in-out duration-150">
                        Categories
                    </button>
                </span>
            </x-slot>
            <x-slot name="content" wire:model="category">
                <div>
                    {{--<x-dropdown-link :href="route('servStart')" wire:click.prevent="selectcategory(0)">All</x-dropdown-link>--}}
                    @foreach($categories as $category)
                        <x-dropdown-link :href="route('servStart', ['category'=>$category->category_name])" wire:click.prevent="selectcategory({{ $category->id }})">
                            {{ $category->categoryName }}
                        </x-dropdown-link>
                    @endforeach
                </div>
            </x-slot>
        </x-dropdownLeft>
    </div>
</div>
