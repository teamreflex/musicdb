<?php

namespace Tests\Feature;

use App\Models\Album;
use App\Models\Artist;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Airlock\Airlock;
use Tests\TestCase;

class AlbumControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_album_index()
    {
        factory(Album::class, 3)->create();

        $res = $this->json('get', '/api/album');

        $this->assertCount(3, $res->json('data'));
    }

    public function test_album_can_be_created()
    {
        Airlock::actingAs(factory(User::class)->state('admin')->create());

        $artist = factory(Artist::class)->create();

        $this->json('post', '/api/album', [
            'artist_id' => $artist->id,
            'name_en' => 'test',
        ]);

        $this->assertDatabaseHas('albums', [
            'name_en' => 'test',
        ]);
    }

    public function test_album_can_be_shown()
    {
        $album = factory(Album::class)->create();

        $res = $this->json('get', '/api/album/'.$album->id);

        $this->assertEquals($album->name_en, $res->json('data.name_en'));
    }

    public function test_album_can_be_updated()
    {
        Airlock::actingAs(factory(User::class)->state('admin')->create());

        $album = factory(Album::class)->create();

        $this->json('put', '/api/album/'.$album->id, [
            'artist_id' => $album->artist_id,
            'name_en' => 'test',
        ]);

        $this->assertDatabaseHas('albums', [
            'name_en' => 'test',
        ]);
    }

    public function test_album_can_be_deleted()
    {
        Airlock::actingAs(factory(User::class)->state('admin')->create());

        $album = factory(Album::class)->create();

        $this->json('delete', '/api/album/'.$album->id);

        $this->assertDatabaseMissing('albums', [
            'id' => $album->id,
        ]);
    }
}
