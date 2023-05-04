<?php

namespace App\Providers;
use App\Models\Photo;
use App\Observers\PhotosObserver;
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
        Photo::observe(PhotosObserver::class);
    }
}
