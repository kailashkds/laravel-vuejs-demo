<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categories', 'CategoriesController@index');
Route::get('/clues/{category}/{offset}', 'CluesController@index');