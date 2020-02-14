<?php

namespace App\Providers;

use App\Services\Spotify\SpotifyService;
use App\Services\Spotify\SpotifyServiceContract;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SpotifyServiceContract::class, SpotifyService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
