<?php

namespace App\Providers;

use App\Models\cart;
use App\Models\categorie;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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

        Schema::defaultStringLength(191);
        Paginator::useBootstrapFour();
        View::share('globel_categories',categorie::all());
        View::share('privite_categories',categorie::with('childrn')->whereNull('parent_id')->limit(4)->get());
        View::share('carts',cart::all());





    }
}
