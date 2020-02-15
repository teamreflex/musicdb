<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photocard extends Model
{
    protected $fillable = [
        'artist_id',
        'album_id',
        'type',
        'image',
    ];

    protected $casts = [
        'artist_id' => 'integer',
        'album_id' => 'integer',
        'type' => 'integer',
    ];

    /**
     * The artist this photocard belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    /**
     * The album this photocard belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
