<?php

namespace App\Policies;

use App\Models\Album;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AlbumPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any albums.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the album.
     *
     * @param User $user
     * @param Album $album
     * @return bool
     */
    public function view(?User $user, Album $album): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create albums.
     *
     * @param User $user
     * @return bool
     */
    public function create(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the album.
     *
     * @param User $user
     * @param Album $album
     * @return bool
     */
    public function update(?User $user, Album $album): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the album.
     *
     * @param User $user
     * @param Album $album
     * @return bool
     */
    public function delete(?User $user, Album $album): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the album.
     *
     * @param User $user
     * @param Album $album
     * @return bool
     */
    public function restore(?User $user, Album $album): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the album.
     *
     * @param User $user
     * @param Album $album
     * @return bool
     */
    public function forceDelete(?User $user, Album $album): bool
    {
        return true;
    }
}
