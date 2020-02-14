<?php

namespace App\Providers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Member;
use App\Models\Subunit;
use App\Policies\AlbumPolicy;
use App\Policies\ArtistPolicy;
use App\Policies\MemberPolicy;
use App\Policies\SubunitPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Artist::class => ArtistPolicy::class,
        Subunit::class => SubunitPolicy::class,
        Member::class => MemberPolicy::class,
        Album::class => AlbumPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
