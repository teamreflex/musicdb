<?php

use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::middleware('auth:airlock')->get('/user', 'UserController@current');
