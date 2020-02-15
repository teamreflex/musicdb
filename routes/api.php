<?php

use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::middleware('auth:airlock')->get('/user', 'UserController@current');
Route::get('/user/{username}', 'UserController@profile');
Route::post('/collection', 'UserController@addToCollection');

Route::apiResources([
    'artist' => 'ArtistController',
    'member' => 'MemberController',
    'subunit' => 'SubunitController',
    'album' => 'AlbumController',
    'photocard' => 'PhotocardController',
]);
