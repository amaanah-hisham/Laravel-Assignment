<?php

namespace App\Providers;

use App\Models\ProductCategory;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

//    public $base_categories;
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();


        view()->composer('layouts.base', function ($view) {
            $view->with('base_categories', ProductCategory::orderBy('name', 'ASC')->get());
        });
    }
}
