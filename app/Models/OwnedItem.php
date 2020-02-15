<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OwnedItem extends Model
{
    protected $fillable = [
        'user_id',
        'collectable_id',
        'collectable_type',
        'amount',
        'is_signed',
        'is_promo',
        'acquired_at',
    ];

    /**
     * The user who owns this item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The entity this corresponds to (Album, Photocard)
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function collectable()
    {
        return $this->morphTo('collectable');
    }
}
