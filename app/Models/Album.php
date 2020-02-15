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
        'description',
        'spotify_id',
        'spotify_image',
        'cover_art',
        'album_image',
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
