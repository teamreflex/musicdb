<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = [
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
        'spotify_id',
    ];

    /**
     * Subunits that this artist/group has.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subunits()
    {
        return $this->hasMany(Subunit::class);
    }

    /**
     * Members that this artist/group has.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members()
    {
        return $this->hasMany(Member::class);
    }

    /**
     * Albums that this artist has.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    /**
     * Photocards for this artist.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photocards()
    {
        return $this->hasMany(Photocard::class);
    }
}
