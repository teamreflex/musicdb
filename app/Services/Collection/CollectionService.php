<?php

namespace App\Services\Collection;

use App\Models\Album;
use App\Models\OwnedItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class CollectionService implements CollectionServiceContract
{
    /**
     * {@inheritdoc}
     */
    public function add(User $user, string $type, int $id, array $data = []): OwnedItem
    {
        $owned = OwnedItem::whereHasMorph(
            'collectable',
            [Album::class],
            function (Builder $query) use ($data) {
                $query->where([
                    ['is_signed', '=', $data['is_signed']],
                    ['is_promo', '=', $data['is_promo']],
                ]);
            }
        )->where([
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
