<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

use Illuminate\Pagination\Paginator;

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
        // OJO esto Deshabilita la asignación masiva de todos los modelos
        // OJO: Siempre usar el método "model->validated()" para asegurar los campos
        Model::unguard();

        // Error: "Specified key was too long"
        Schema::defaultStringLength(191);


        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
