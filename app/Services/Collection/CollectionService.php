<?php

namespace App\Services\Collection;

use App\Models\OwnedItem;
use App\Models\User;

class CollectionService implements CollectionServiceContract
{
    /**
     * {@inheritdoc}
     */
    public function add(User $user, string $type, int $id, array $data = []): OwnedItem
    {
        $owned = OwnedItem::where([
            ['user_id', '=', $user->id],
            ['collectable_type', '=', $type],
            ['collectable_id', '=', $id],
        ])->first();

        if ($owned) {
            $owned->amount++;
            $owned->save();
        } else {
            $owned = OwnedItem::create(array_merge($data, [
                'user_id' => $user->id,
            ]));
        }

        return $owned;
    }

    /**
     * {@inheritdoc}
     */
    public function remove(User $user, OwnedItem $ownedItem): bool
    {
        return $ownedItem->delete();
    }
}
