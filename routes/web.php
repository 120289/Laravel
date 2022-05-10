<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\ArtistController::class,'index']);
Route::resource('artists', 'App\Http\Controllers\ArtistController');
Route::resource('artistphotos', 'App\Http\Controllers\ArtistPhotoController');
Route::resource('albums', 'App\Http\Controllers\AlbumController');
Route::resource('albumphotos', 'App\Http\Controllers\ArtistPhotoController');
