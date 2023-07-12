<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $ProductData = Product::query()->inRandomOrder()->get()/*query()->paginate(10)*/;
        $categories = Category::all();
        View::share('products', $ProductData);
        View::share('categories', $categories);
    }
}
