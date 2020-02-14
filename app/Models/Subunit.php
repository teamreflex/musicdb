<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subunit extends Model
{
    protected $fillable = [
        'artist_id',
        'name_en',
        'name_kr',
        'name_romanized',
        'description',
        'twitter',
        'facebook',
        'youtube',
        'instagram',
        'spotify',
        'daum',
        'header_url',
        'icon_url',
        'logo_url',
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
