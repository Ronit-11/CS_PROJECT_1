<div>
    {{--<div wire:click="showProduct" wire:loading.attr="disabled" class="p-4 text-gray-900 cursor-pointer">
        <img src="{{ URL('Images/SERV.png') }}" height="50px" width="50px">
    </div>

    <x-dialog-modal wire:model="showingProduct" >

        <x-slot name="title">
            Modal custom title
        </x-slot>

        <x-slot name="content">
            <p>Test modal content</p>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('showingProduct', false)" wire:loading.attr="disabled">
                {{ __('Cancel')  }}
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>--}}
    @if(isset($catName))
        <div class="flex">
            <x-nav-link href="{{ route('servStart') }}" wire:click.prevent="categoryUpdated(0)" class="pr-0.2">
                Home >
            </x-nav-link>
            <x-nav-link href="" class="pl-0 pr-0.2">
                {{ $catName }}
            </x-nav-link>
        </div>
    @endif

    <div class="bg-gray-100 bg-opacity-25 grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-2 md:grid-cols-3 gap-6 lg:gap-8 p-6 lg:p-8 lg:grid-cols-6 xl:grid-cols-4 xl:gap-x-12">
       {{-- @if(isset($CategorizedProducts))
            @if(!Auth::User())
                --}}{{--@php
                    $CategorizedProducts = $CategorizedProducts->random(5);
                @endphp--}}{{--
            @endif
            @foreach($CategorizedProducts as $product)

                <button wire:click="showProduct({{ $product->id }})" wire:loading.attr="disabled" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="{{ URL($product->image) }}" alt="{{ $product -> name }}" class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>
                    <h3 class="mt-4 text-xl font-semibold text-gray-900">{{ $product -> name }}</h3>
                    <p class="mt-1 text-sm font-medium text-gray-800">KSh {{ $product -> price }}</p>
                    <p class=' text-sm mt-1 font-medium text-gray-800'>{{ $product -> description }}</p>
                </button>
            @endforeach

        @else
            @if(!Auth::User())
                --}}{{--@php
                    $products = $products->random(24);
                @endphp--}}{{--
            @endif
            @foreach($products as $product)
                <button --}}{{--type="button"--}}{{-- wire:click="showProduct({{ $product->id }})" wire:loading.attr="disabled" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="{{ URL($product->image) }}" alt="{{ $product -> name }}" class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>
                    <h3 class="mt-4 text-xl font-semibold text-gray-900">{{ $product -> name }}</h3>
                    <p class="mt-1 text-sm font-medium text-gray-800">KSh {{ $product -> price }}</p>
                    <p class=' text-sm mt-1 font-medium text-gray-800'>{{ $product -> description }}</p>
                </button>
            @endforeach
        @endif--}}
        @php
        /*dd($sProducts);*/
 @endphp

        @if(isset($sProducts))
            @foreach($sProducts as $product)
                <button {{--type="button"--}} wire:click="showProduct({{ $product->id }})" wire:loading.attr="disabled" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="{{ URL($product->image) }}" alt="{{ $product -> name }}" class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>
                    <h3 class="mt-4 text-xl font-semibold text-gray-900">{{ $product -> name }}</h3>
                    <p class="mt-1 text-sm font-medium text-gray-800">KSh {{ $product -> price }}</p>
                    <p class=' text-sm mt-1 font-medium text-gray-800'>{{ $product -> description }}</p>
                </button>
            @endforeach
        @endif
    </div>

    {{--@if(isset($CategorizedProducts))
        {{  $CategorizedProducts->links() }}    if the product model all fetched in ->paginate()
    @else
    {{ $products->links() }}
    @endif--}}

    <x-product-modal wire:model="showingProduct" >
        <x-slot name="title" >
            @if(isset($selectedProduct))
                {{ $selectedProduct->name }}
            @endif
        </x-slot>

        <x-slot name="content">
            @if(isset($selectedProduct))
                <img src="{{ URL($selectedProduct->image) }}" height="400px">
            @endif
            <x-input type="text" wire:model:lazy="description" placeholder="Extra Description"/>
                {{--<x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />--}}
            <x-input type="number" wire:model:lazy="quantity" required placeholder="quantity" value="1"/>
        </x-slot>

        <x-slot name="footer">
            @php
                if(isset($cartItems)){
                    foreach($cartItems as $cart){
                        if($cart->id == $selectedProduct->id){
            @endphp
                            <span>This Item is already in cart.</span>
            @php
                        }
                    }
                }else{
            @endphp
            <x-button wire:click="addToCart" wire:loading.attr="disabled">
                {{ __('Add To Cart')  }}
            </x-button>
            @php } @endphp
        </x-slot>
    </x-product-modal>
</div>
