<?php

namespace App\Console\Commands;

use App\Services\Spotify\SpotifyServiceContract;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class AddArtist extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artist:add {artist} {--albums}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new artist from Spotify.';

    /**
     * @var SpotifyServiceContract
     */
    protected SpotifyServiceContract $spotify;

    /**
     * AddArtist constructor.
     * @param SpotifyServiceContract $spotify
     */
    public function __construct(SpotifyServiceContract $spotify)
    {
        parent::__construct();

        $this->spotify = $spotify;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $artist = $this->spotify->addArtist($this->argument('artist'), (bool) $this->option('albums'));

        $this->info("Added \"{$artist->name_en}\" with {$artist->albums()->count()} albums.");
    }
}
