<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'artist_id',
        'subunit_id',
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
     * The artist/group that this member belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    /**
     * The subunit that this member belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subunit()
    {
        return $this->belongsTo(Subunit::class);
    }
}
