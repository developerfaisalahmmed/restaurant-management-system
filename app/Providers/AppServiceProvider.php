<?php

namespace App\Providers;

use App\Models\RestaurantFoodCategory;
use Illuminate\Support\ServiceProvider;
use View;
use Illuminate\Pagination\Paginator;

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
        View::composer('frontend.layouts.partials.siteber',function ($view){
            $view->with('categories', RestaurantFoodCategory::where('restaurant_food_category_status', 1)->get() );
        });
        View::composer('frontend.layouts.partials.footer',function ($view){
            $view->with('categories', RestaurantFoodCategory::where('restaurant_food_category_status', 1)->get() );
        });

        Paginator::useBootstrap();
    }
}
