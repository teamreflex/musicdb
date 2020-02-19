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
    public function parse(string $uri, string $type = 'artist'): string
    {
        if (Str::startsWith($uri, "spotify:{$type}:")) {
            return Str::replaceFirst("spotify:{$type}:", '', $uri);
        }

        return $uri;
    }

    /**
     * {@inheritdoc}
     */
    public function addArtist(string $uri, bool $importAlbums = false): Artist
    {
        $parsed = $this->parse($uri);
        $artist = $this->api()->getArtist($parsed);

        // fetch existing if it exists
        $artistModel = Artist::where('spotify_id', $parsed)->first();
        if (! $artistModel) {
            $artistModel = Artist::create([
                'name_en' => $artist->name,
                'spotify_id' => $artist->id,
                'spotify_image' => $artist->images[0]->url ?? null,
            ]);
        }

        if ($importAlbums) {
            $this->importAlbums($artistModel);
        }

        return $artistModel;
    }

    /**
     * {@inheritdoc}
     */
    public function addAlbum(string $album): Album
    {
        $parsed = $this->parse($album, 'album');

        $spotifyAlbum = $this->api()->getAlbum($parsed);
        $artist = $this->addArtist($spotifyAlbum->artists[0]->uri);

        return $this->createOrUpdateAlbum($artist, $spotifyAlbum);
    }

    /**
     * Import: create or update albums.
     *
     * @param Artist $artist
     */
    protected function importAlbums(Artist $artist): void
    {
        $albums = $this->api()->getArtistAlbums($artist->spotify_id);

        collect($albums->items)->each(function ($spotifyAlbum) use ($artist) {
            $this->createOrUpdateAlbum($artist, $spotifyAlbum);
        });
    }

    /**
     * Update any existing album or create it if it doesn't exist.
     *
     * @param Artist $artist
     * @param $spotifyAlbum
     * @return Album
     */
    protected function createOrUpdateAlbum(Artist $artist, $spotifyAlbum): Album
    {
        $albums = Album::where('spotify_id', $spotifyAlbum->id)->get();

        if ($albums->count() > 0) {
            // update existing album spotify images
            return $albums->each(function ($localAlbum) use ($spotifyAlbum) {
                $localAlbum->spotify_image = $spotifyAlbum->images[0]->url;
                $localAlbum->save();
            })->first();
        } else {
            // otherwise make the album
            return Album::create([
                'name_en' => $spotifyAlbum->name,
                'spotify_image' => $spotifyAlbum->images[0]->url,
                'artist_id' => $artist->id,
                'spotify_id' => $spotifyAlbum->id,
                'release_date' => $spotifyAlbum->release_date,
            ]);
        }
    }
}
