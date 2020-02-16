<?php

namespace App\Policies;

use App\Models\Member;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemberPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any members.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the member.
     *
     * @param User $user
     * @param Member $member
     * @return bool
     */
    public function view(?User $user, Member $member): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create members.
     *
     * @param User $user
     * @return bool
     */
    public function create(?User $user): bool
    {
        return optional($user)->is_admin;
    }

    /**
     * Determine whether the user can update the member.
     *
     * @param User $user
     * @param Member $member
     * @return bool
     */
    public function update(?User $user, Member $member): bool
    {
        return optional($user)->is_admin;
    }

    /**
     * Determine whether the user can delete the member.
     *
     * @param User $user
     * @param Member $member
     * @return bool
     */
    public function delete(?User $user, Member $member): bool
    {
        return optional($user)->is_admin;
    }

    /**
     * Determine whether the user can restore the member.
     *
     * @param User $user
     * @param Member $member
     * @return bool
     */
    public function restore(?User $user, Member $member): bool
    {
        return optional($user)->is_admin;
    }

    /**
     * Determine whether the user can permanently delete the member.
     *
     * @param User $user
     * @param Member $member
     * @return bool
     */
    public function forceDelete(?User $user, Member $member): bool
    {
        return optional($user)->is_admin;
    }
}
