<?php

use Illuminate\Support\Facades\Route;

Route::get('/user/{username}', 'UserController@profile');

Route::apiResource('artist', 'ArtistController')->only(['index', 'show']);
Route::apiResource('member', 'MemberController')->only(['index', 'show']);
Route::apiResource('subunit', 'SubunitController')->only(['index', 'show']);
Route::apiResource('album', 'AlbumController')->only(['index', 'show']);
Route::apiResource('photocard', 'PhotocardController')->only(['index', 'show']);
