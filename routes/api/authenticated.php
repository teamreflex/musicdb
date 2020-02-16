<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'auth:airlock',
], function () {
    Route::get('/user', 'UserController@current');
    Route::put('/user', 'UserController@update');

    // API resources
    Route::apiResource('artist', 'ArtistController')->except(['index', 'show']);
    Route::apiResource('member', 'MemberController')->except(['index', 'show']);
    Route::apiResource('subunit', 'SubunitController')->except(['index', 'show']);
    Route::apiResource('album', 'AlbumController')->except(['index', 'show']);
    Route::apiResource('photocard', 'PhotocardController')->except(['index', 'show']);

    // Collection
    Route::group([
        'prefix' => 'collection',
    ], function () {
        Route::post('/', 'CollectionController@add');
        Route::delete('/{ownedItem}', 'CollectionController@remove');
    });
});
