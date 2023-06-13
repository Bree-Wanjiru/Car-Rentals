<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
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
        //used instead of fillable properties
        //with this be aware of what is going to the db
        Model::unguard();

        //to add another type of paginator from the folder
        // Paginator::useBootstrapFive();
    }
}
