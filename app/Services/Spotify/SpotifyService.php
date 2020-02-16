<?php

namespace App\Services\Spotify;

use App\Models\Album;
use App\Models\Artist;
use Carbon\Carbon;
use Illuminate\Cache\Repository;
use Illuminate\Support\Str;
use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;

class SpotifyService implements SpotifyServiceContract
{
    /**
     * @var Repository
     */
    protected Repository $cache;

    /**
     * @var SpotifyWebAPI
     */
    protected SpotifyWebAPI $spotify;

    /**
     * SpotifyService constructor.
     * @param Repository $cache
     */
    public function __construct(Repository $cache)
    {
        $this->cache = $cache;
    }

    /**
     * {@inheritdoc}
     */
    public function api(): SpotifyWebAPI
    {
        if (isset($this->spotify)) {
            return $this->spotify;
        }

        $this->spotify = new SpotifyWebAPI();
        $this->spotify->setAccessToken($this->getToken());

        return $this->spotify;
    }

    /**
     * {@inheritdoc}
     */
    public function getToken(): string
    {
        return $this->cache->remember('spotify.key', Carbon::now()->addDay(), function () {
            $session = new Session(
                config('services.spotify.client_id'),
                config('services.spotify.client_secret')
            );

            $session->requestCredentialsToken();

            return $session->getAccessToken();
        });
    }

    /**
     * {@inheritdoc}
     */
    public function parseArtist(string $uri): string
    {
        if (Str::startsWith($uri, 'spotify:artist:')) {
            return Str::replaceFirst('spotify:artist:', '', $uri);
        }

        return $uri;
    }

    /**
     * {@inheritdoc}
     */
    public function addArtist(string $uri, bool $importAlbums = false): Artist
    {
        $artist = $this->api()->getArtist($this->parseArtist($uri));
        $artistModel = Artist::create([
            'name_en' => $artist->name,
            'spotify_id' => $artist->id,
            'spotify_image' => $artist->images[0]->url ?? null,
        ]);

        if ($importAlbums) {
            $albums = $this->api()->getArtistAlbums($artist->id);
            collect($albums->items)->each(function ($album) use ($artistModel) {
                Album::create([
                    'name_en' => $album->name,
                    'spotify_image' => $album->images[0]->url,
                    'artist_id' => $artistModel->id,
                    'spotify_id' => $album->id,
                    'release_date' => $album->release_date,
                ]);
            });
        }

        return $artistModel;
    }
}
