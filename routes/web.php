<?php

Route::get('{any}', function () {
    return view('template');
})->where('any', '.*');
