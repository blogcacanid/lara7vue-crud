<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/pegawais', 'PegawaiController@index');
Route::post('/pegawai/store', 'PegawaiController@store');
Route::get('/pegawai/edit/{id}', 'PegawaiController@getPegawai');
Route::get('/pegawai/show/{id}', 'PegawaiController@getPegawai');
Route::put('/pegawai/update/{id}', 'PegawaiController@update');
Route::delete('/pegawai/delete/{id}', 'PegawaiController@delete'); 