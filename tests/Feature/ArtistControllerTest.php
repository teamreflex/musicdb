<?php

namespace Tests\Feature;

use App\Models\Artist;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArtistControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_artist_index()
    {
        factory(Artist::class, 3)->create();

        $res = $this->json('get', '/api/artist');

        $this->assertCount(3, $res->json('data'));
    }

    public function test_artist_can_be_created()
    {
        $this->json('post', '/api/artist', [
            'name_en' => 'test',
            'header_url' => 'test',
            'icon_url' => 'test',
            'logo_url' => 'test',
        ]);

        $this->assertDatabaseHas('artists', [
            'name_en' => 'test',
        ]);
    }

    public function test_artist_can_be_shown()
    {
        $artist = factory(Artist::class)->create();

        $res = $this->json('get', '/api/artist/' . $artist->id);

        $this->assertEquals($artist->name_en, $res->json('data.name_en'));
    }

    public function test_artist_can_be_updated()
    {
        $artist = factory(Artist::class)->create();

        $this->json('put', '/api/artist/' . $artist->id, [
            'name_en' => 'test',
            'header_url' => 'test',
            'icon_url' => 'test',
            'logo_url' => 'test',
        ]);

        $this->assertDatabaseHas('artists', [
            'name_en' => 'test',
        ]);
    }

    public function test_artist_can_be_deleted()
    {
        $artist = factory(Artist::class)->create();

        $this->json('delete', '/api/artist/' . $artist->id);

        $this->assertDatabaseMissing('artists', [
            'id' => $artist->id,
        ]);
    }
}
