<?php

namespace App\Services\Spotify;

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
     * Parse the artist ID from a URI.
     *
     * @param string $uri
     * @return string
     */
    public function parseArtist(string $uri): string;

    /**
     * Fetch an artist from Spotify and make it locally.
     *
     * @param string $uri
     * @param bool $importAlbums
     * @return Artist
     */
    public function addArtist(string $uri, bool $importAlbums = false): Artist;
}
