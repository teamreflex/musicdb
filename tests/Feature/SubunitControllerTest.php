<?php

namespace Tests\Feature;

use App\Models\Artist;
use App\Models\Subunit;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Airlock\Airlock;
use Tests\TestCase;

class SubunitControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_subunit_index()
    {
        factory(Subunit::class, 3)->create();

        $res = $this->json('get', '/api/subunit');

        $this->assertCount(3, $res->json('data'));
    }

    public function test_subunit_can_be_created()
    {
        Airlock::actingAs(factory(User::class)->create());

        $artist = factory(Artist::class)->create();

        $this->json('post', '/api/subunit', [
            'artist_id' => $artist->id,
            'name_en' => 'test',
        ]);

        $this->assertDatabaseHas('subunits', [
            'name_en' => 'test',
        ]);
    }

    public function test_subunit_can_be_shown()
    {
        $subunit = factory(Subunit::class)->create();

        $res = $this->json('get', '/api/subunit/' . $subunit->id);

        $this->assertEquals($subunit->name_en, $res->json('data.name_en'));
    }

    public function test_subunit_can_be_updated()
    {
        Airlock::actingAs(factory(User::class)->create());

        $subunit = factory(Subunit::class)->create();

        $this->json('put', '/api/subunit/' . $subunit->id, [
            'artist_id' => $subunit->artist_id,
            'name_en' => 'test',
        ]);

        $this->assertDatabaseHas('subunits', [
            'name_en' => 'test',
        ]);
    }

    public function test_subunit_can_be_deleted()
    {
        Airlock::actingAs(factory(User::class)->create());

        $subunit = factory(Subunit::class)->create();

        $this->json('delete', '/api/subunit/' . $subunit->id);

        $this->assertDatabaseMissing('subunits', [
            'id' => $subunit->id,
        ]);
    }
}
