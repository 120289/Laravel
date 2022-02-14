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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('albums', 'App\Http\Controllers\AlbumController');
// Route::resource('artists', 'App\Http\Controllers\ArtistController');
Route::resource('genres', App\Http\Controllers\GenreController::class);
Route::resource('songs', 'App\Http\Controllers\SongController');
Route::resource('artists', App\Http\Controllers\ArtistController::class);
