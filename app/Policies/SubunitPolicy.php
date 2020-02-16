<?php

namespace App\Policies;

use App\Models\Subunit;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubunitPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any subunits.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the subunit.
     *
     * @param User $user
     * @param Subunit $subunit
     * @return bool
     */
    public function view(?User $user, Subunit $subunit): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create subunits.
     *
     * @param User $user
     * @return bool
     */
    public function create(?User $user): bool
    {
        return optional($user)->is_admin;
    }

    /**
     * Determine whether the user can update the subunit.
     *
     * @param User $user
     * @param Subunit $subunit
     * @return bool
     */
    public function update(?User $user, Subunit $subunit): bool
    {
        return optional($user)->is_admin;
    }

    /**
     * Determine whether the user can delete the subunit.
     *
     * @param User $user
     * @param Subunit $subunit
     * @return bool
     */
    public function delete(?User $user, Subunit $subunit): bool
    {
        return optional($user)->is_admin;
    }

    /**
     * Determine whether the user can restore the subunit.
     *
     * @param User $user
     * @param Subunit $subunit
     * @return bool
     */
    public function restore(?User $user, Subunit $subunit): bool
    {
        return optional($user)->is_admin;
    }

    /**
     * Determine whether the user can permanently delete the subunit.
     *
     * @param User $user
     * @param Subunit $subunit
     * @return bool
     */
    public function forceDelete(?User $user, Subunit $subunit): bool
    {
        return optional($user)->is_admin;
    }
}
