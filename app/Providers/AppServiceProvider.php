<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Review;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with([
                '_categories' => Category::all(['id', 'name']),
                '_shopcart' => session('cart'),
                '_items' => Item::all(['id', 'name', 'price', 'summary', 'image']),
                '_reviews' => Review::all(['id', 'user_id', 'review', 'rating', 'item_id'])
            ]);

        });

    }
}
