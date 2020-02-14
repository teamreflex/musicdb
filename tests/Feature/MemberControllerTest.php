<?php

namespace Tests\Feature;

use App\Models\Artist;
use App\Models\Member;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MemberControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_member_index()
    {
        factory(Member::class, 3)->create();

        $res = $this->json('get', '/api/member');

        $this->assertCount(3, $res->json('data'));
    }

    public function test_member_can_be_created()
    {
        $artist = factory(Artist::class)->create();

        $this->json('post', '/api/member', [
            'artist_id' => $artist->id,
            'name_en' => 'test',
            'header_url' => 'test',
            'icon_url' => 'test',
            'logo_url' => 'test',
        ]);

        $this->assertDatabaseHas('members', [
            'name_en' => 'test',
        ]);
    }

    public function test_member_can_be_shown()
    {
        $member = factory(Member::class)->create();

        $res = $this->json('get', '/api/member/' . $member->id);

        $this->assertEquals($member->name_en, $res->json('data.name_en'));
    }

    public function test_member_can_be_updated()
    {
        $member = factory(Member::class)->create();

        $this->json('put', '/api/member/' . $member->id, [
            'artist_id' => $member->artist_id,
            'name_en' => 'test',
            'header_url' => 'test',
            'icon_url' => 'test',
            'logo_url' => 'test',
        ]);

        $this->assertDatabaseHas('members', [
            'name_en' => 'test',
        ]);
    }

    public function test_member_can_be_deleted()
    {
        $member = factory(Member::class)->create();

        $this->json('delete', '/api/member/' . $member->id);

        $this->assertDatabaseMissing('members', [
            'id' => $member->id,
        ]);
    }
}
