<?php

namespace App\Policies;

use App\Models\Photocard;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhotocardPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any photocards.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the photocard.
     *
     * @param User $user
     * @param Photocard $photocard
     * @return bool
     */
    public function view(?User $user, Photocard $photocard): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create photocards.
     *
     * @param User $user
     * @return bool
     */
    public function create(?User $user): bool
    {
        return optional($user)->is_admin;
    }

    /**
     * Determine whether the user can update the photocard.
     *
     * @param User $user
     * @param Photocard $photocard
     * @return bool
     */
    public function update(?User $user, Photocard $photocard): bool
    {
        return optional($user)->is_admin;
    }

    /**
     * Determine whether the user can delete the photocard.
     *
     * @param User $user
     * @param Photocard $photocard
     * @return bool
     */
    public function delete(?User $user, Photocard $photocard): bool
    {
        return optional($user)->is_admin;
    }

    /**
     * Determine whether the user can restore the photocard.
     *
     * @param User $user
     * @param Photocard $photocard
     * @return bool
     */
    public function restore(?User $user, Photocard $photocard): bool
    {
        return optional($user)->is_admin;
    }

    /**
     * Determine whether the user can permanently delete the photocard.
     *
     * @param User $user
     * @param Photocard $photocard
     * @return bool
     */
    public function forceDelete(?User $user, Photocard $photocard): bool
    {
        return optional($user)->is_admin;
    }
}
