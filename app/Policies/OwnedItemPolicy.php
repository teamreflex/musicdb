<?php

namespace App\Policies;

use App\Models\OwnedItem;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OwnedItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any owned items.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the owned item.
     *
     * @param User $user
     * @param OwnedItem $ownedItem
     * @return bool
     */
    public function view(?User $user, OwnedItem $ownedItem): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create owned items.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the owned item.
     *
     * @param User $user
     * @param OwnedItem $ownedItem
     * @return bool
     */
    public function update(User $user, OwnedItem $ownedItem): bool
    {
        return $user->id === $ownedItem->user_id;
    }

    /**
     * Determine whether the user can delete the owned item.
     *
     * @param User $user
     * @param OwnedItem $ownedItem
     * @return bool
     */
    public function delete(User $user, OwnedItem $ownedItem): bool
    {
        return $user->id === $ownedItem->user_id;
    }

    /**
     * Determine whether the user can restore the owned item.
     *
     * @param User $user
     * @param OwnedItem $ownedItem
     * @return bool
     */
    public function restore(User $user, OwnedItem $ownedItem): bool
    {
        return $user->id === $ownedItem->user_id;
    }

    /**
     * Determine whether the user can permanently delete the owned item.
     *
     * @param User $user
     * @param OwnedItem $ownedItem
     * @return bool
     */
    public function forceDelete(User $user, OwnedItem $ownedItem): bool
    {
        return $user->id === $ownedItem->user_id;
    }
}
