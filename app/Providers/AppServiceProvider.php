<?php

namespace App\Providers;

use App\Models\Album;
use App\Models\Photocard;
use App\Services\Spotify\SpotifyService;
use App\Services\Spotify\SpotifyServiceContract;
use Illuminate\Database\Eloquent\Relations\Relation;
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
        Relation::$morphMap = [
            'album' => Album::class,
            'photocard' => Photocard::class,
        ];

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
