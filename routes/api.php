<?php

use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::middleware('auth:airlock')->get('/user', 'UserController@current');

Route::apiResources([
    'artist' => 'ArtistController',
    'member' => 'MemberController',
    'subunit' => 'SubunitController',
    'album' => 'AlbumController',
]);
