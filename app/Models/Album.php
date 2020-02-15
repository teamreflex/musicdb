<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'artist_id',
        'subunit_id',
        'name_en',
        'name_kr',
        'name_romanized',
        'description',
        'spotify_id',
        'header_url',
        'icon_url',
        'logo_url',
        'release_date',
        'version',
        'primary_version',
    ];

    protected $dates = [
        'release_date',
    ];

    /**
     * The artist/group that this album belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    /**
     * The subunit that this album belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subunit()
    {
        return $this->belongsTo(Subunit::class);
    }

    /**
     * Photocards in this album.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photocards()
    {
        return $this->hasMany(Photocard::class);
    }
}
