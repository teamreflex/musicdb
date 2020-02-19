<?php

namespace App\Services\Spotify;

use App\Models\Album;
use App\Models\Artist;
use SpotifyWebAPI\SpotifyWebAPI;

interface SpotifyServiceContract
{
    /**
     * Get the Spotify client instance.
     *
     * @return SpotifyWebAPI
     */
    public function api(): SpotifyWebAPI;

    /**
     * Generate the Spotify Oauth token.
     *
     * @return string
     */
    public function getToken(): string;

    /**
     * Parse the ID from a URI.
     *
     * @param string $uri
     * @param string $type
     * @return string
     */
    public function parse(string $uri, string $type = 'artist'): string;

    /**
     * Fetch an artist from Spotify and make it locally.
     *
     * @param string $uri
     * @param bool $importAlbums
     * @return Artist
     */
    public function addArtist(string $uri, bool $importAlbums = false): Artist;

    /**
     * Import a single album.
     *
     * @param string $album
     * @return Album
     */
    public function addAlbum(string $album): Album;
}
