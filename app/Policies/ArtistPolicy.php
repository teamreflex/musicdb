<?php

namespace App\Policies;

use App\Models\Artist;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArtistPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any artists.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the artist.
     *
     * @param User $user
     * @param Artist $artist
     * @return bool
     */
    public function view(?User $user, Artist $artist): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create artists.
     *
     * @param User $user
     * @return bool
     */
    public function create(?User $user): bool
    {
        return optional($user)->is_admin;
    }

    /**
     * Determine whether the user can update the artist.
     *
     * @param User $user
     * @param Artist $artist
     * @return bool
     */
    public function update(?User $user, Artist $artist): bool
    {
        return optional($user)->is_admin;
    }

    /**
     * Determine whether the user can delete the artist.
     *
     * @param User $user
     * @param Artist $artist
     * @return bool
     */
    public function delete(?User $user, Artist $artist): bool
    {
        return optional($user)->is_admin;
    }

    /**
     * Determine whether the user can restore the artist.
     *
     * @param User $user
     * @param Artist $artist
     * @return bool
     */
    public function restore(?User $user, Artist $artist): bool
    {
        return optional($user)->is_admin;
    }

    /**
     * Determine whether the user can permanently delete the artist.
     *
     * @param User $user
     * @param Artist $artist
     * @return bool
     */
    public function forceDelete(?User $user, Artist $artist): bool
    {
        return optional($user)->is_admin;
    }
}
