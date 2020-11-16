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

// TODAY ROUTES
Route::get('today', 'App\Http\Controllers\PictureController@getTodayPosts');

// LIVE STREAM ROUTES
Route::get('streams', 'App\Http\Controllers\StreamController@getLiveStream');

// VIDEOS ROUTES
Route::get('videos', 'App\Http\Controllers\VideoController@getAllVideos');
Route::get('video/file/{videoId}', ['uses' => 'App\Http\Controllers\VideoController@viewVideoFile']);

// PICTURES ROUTES
Route::get('pictures', 'App\Http\Controllers\PictureController@getAllPictures');
Route::get('picture/file/{pictureId}', ['uses' => 'App\Http\Controllers\PictureController@viewPictureFile']);



