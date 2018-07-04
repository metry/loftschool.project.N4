<?php

namespace App\Providers;

use App\Category;
use App\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class OutputServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //categories output
        if (Schema::hasTable('categories')) {
            $categories = Category::all()->sortBy('id');
            View::share('categories', $categories);
        }
        //random product output
        if (Schema::hasTable('products')) {
            $randomProduct = Product::inRandomOrder()->first();
            View::share('randomProduct', $randomProduct);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
