<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subunit extends Model
{
    protected $fillable = [
        'artist_id',
        'name_en',
        'name_kr',
        'description',
        'twitter',
        'facebook',
        'youtube',
        'instagram',
        'spotify_id',
        'daum',
        'image',
        'spotify_image',
        'logo',
    ];

    /**
     * The artist/group that this subunit belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    /**
     * Members that this subunit has.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
