<?php

namespace App\Services\Collection;

use App\Models\OwnedItem;
use App\Models\User;

interface CollectionServiceContract
{
    /**
     * Add a new item to the user's collection.
     *
     * @param User $user
     * @param string $type
     * @param int $id
     * @param array $data
     * @return OwnedItem
     */
    public function add(User $user, string $type, int $id, array $data = []): OwnedItem;

    /**
     * Remove an item from the user's collection.
     *
     * @param User $user
     * @param OwnedItem $ownedItem
     * @return bool
     */
    public function remove(User $user, OwnedItem $ownedItem): bool;
}
