<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test','HalamanController@getData');
Route::post('/test/tambah/{nama}/{alamat}','HalamanController@post');
Route::get('/test/{id}','HalamanController@edit');
Route::delete('/test/{id}','HalamanController@delete');
Route::put('/test/{id}','HalamanController@update');
