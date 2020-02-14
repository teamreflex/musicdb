<?php

/**
 * Catch-all route for the SPA to function.
 */
Route::get('{any}', 'LayoutController@layout')->where('any', '.*');
