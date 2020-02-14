<?php

use App\Models\Album;
use App\Models\Artist;
use App\Models\Member;
use App\Models\Subunit;
use Illuminate\Database\Seeder;

class LOONASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artist = Artist::create([
            'name_en' => 'LOONA',
            'name_kr' => '이달의 소녀',
            'twitter' => 'loonatheworld',
            'facebook' => 'loonatheworld',
            'instagram' => 'loonatheworld',
            'youtube' => 'loonatheworld',
            'daum' => 'loonatheworld',
        ]);

        $subunits = [
            [
                'artist_id' => $artist->id,
                'name_en' => '1/3',
                'name_kr' => '1/3',
                'members' => [
                    [
                        'artist_id' => $artist->id,
                        'name_en' => 'Heejin',
                        'name_kr' => '희진',
                    ],
                    [
                        'artist_id' => $artist->id,
                        'name_en' => 'Hyunjin',
                        'name_kr' => '현진',
                    ],
                    [
                        'artist_id' => $artist->id,
                        'name_en' => 'HaSeul',
                        'name_kr' => '하슬',
                    ],
                    [
                        'artist_id' => $artist->id,
                        'name_en' => 'Yeojin',
                        'name_kr' => '여진',
                    ],
                    [
                        'artist_id' => $artist->id,
                        'name_en' => 'ViVi',
                        'name_kr' => '비비',
                    ],
                ],
                'albums' => [
                    [
                        'artist_id' => $artist->id,
                        'name_en' => 'Love & Live',
                        'name_kr' => 'Love & Live',
                    ],
                    [
                        'artist_id' => $artist->id,
                        'name_en' => 'Love & Evil',
                        'name_kr' => 'Love & Evil',
                    ],
                ],
            ],
            [
                'artist_id' => $artist->id,
                'name_en' => 'ODD EYE CIRCLE',
                'name_kr' => 'ODD EYE CIRCLE',
                'members' => [
                    [
                        'artist_id' => $artist->id,
                        'name_en' => 'Kim Lip',
                        'name_kr' => '김립',
                    ],
                    [
                        'artist_id' => $artist->id,
                        'name_en' => 'JinSoul',
                        'name_kr' => '진솔',
                    ],
                    [
                        'artist_id' => $artist->id,
                        'name_en' => 'Choerry',
                        'name_kr' => '최리',
                    ],
                ],
                'albums' => [
                    [
                        'artist_id' => $artist->id,
                        'name_en' => 'Mix & Match',
                        'name_kr' => 'Mix & Match',
                    ],
                    [
                        'artist_id' => $artist->id,
                        'name_en' => 'Max & Match',
                        'name_kr' => 'Max & Match',
                    ],
                ],
            ],
            [
                'artist_id' => $artist->id,
                'name_en' => 'yyxy',
                'name_kr' => 'yyxy',
                'members' => [
                    [
                        'artist_id' => $artist->id,
                        'name_en' => 'Yves',
                        'name_kr' => '이브',
                    ],
                    [
                        'artist_id' => $artist->id,
                        'name_en' => 'Chuu',
                        'name_kr' => '츄',
                    ],
                    [
                        'artist_id' => $artist->id,
                        'name_en' => 'Go Won',
                        'name_kr' => '고원',
                    ],
                    [
                        'artist_id' => $artist->id,
                        'name_en' => 'Olivia Hye',
                        'name_kr' => '올리비아 혜',
                    ],
                ],
                'albums' => [
                    [
                        'artist_id' => $artist->id,
                        'name_en' => 'Beauty & The Beat',
                        'name_kr' => 'Beauty & The Beat',
                    ],
                ],
            ],
        ];

        $albums = [
            [
                'artist_id' => $artist->id,
                'name_en' => '[+ +]',
            ],
            [
                'artist_id' => $artist->id,
                'name_en' => '[X X]',
            ],
            [
                'artist_id' => $artist->id,
                'name_en' => '[#]',
            ],
        ];

        collect($subunits)->each(function ($subunit) {
            $members = $subunit['members'];
            $albums = $subunit['albums'];
            unset($subunit['members'], $subunit['albums']);

            $subunitModel = Subunit::create($subunit);

            collect($members)->each(function ($member) use ($subunitModel) {
                Member::create(array_merge($member, ['subunit_id' => $subunitModel->id]));
            });

            collect($albums)->each(function ($album) use ($subunitModel) {
                Album::create(array_merge($album, ['subunit_id' => $subunitModel->id]));
            });
        });

        collect($albums)->each(function ($album) {
            Album::create($album);
        });
    }
}
