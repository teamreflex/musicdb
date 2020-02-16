<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Airlock\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'favorite_artist',
        'favorite_album',
        'favorite_member',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];

    /**
     * This user's collection of owned items.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collection()
    {
        return $this->hasMany(OwnedItem::class);
    }

    /**
     * This user's favorite artist.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function favoriteArtist()
    {
        return $this->belongsTo(Artist::class, 'favorite_artist');
    }

    /**
     * This user's favorite album.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function favoriteAlbum()
    {
        return $this->belongsTo(Album::class, 'favorite_album');
    }

    /**
     * This user's favorite member.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function favoriteMember()
    {
        return $this->belongsTo(Member::class, 'favorite_member');
    }
}
