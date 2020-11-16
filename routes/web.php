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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function () {

    // TODAY ROUTE
    Route::get('today', 'App\Http\Controllers\PictureController@getTodayPosts')->name('today');


    // LIVE STREAM ROUTES
    Route::get('live_stream', 'App\Http\Controllers\StreamController@getLiveStream')->name('live_stream');
    Route::post('add_stream', 'App\Http\Controllers\StreamController@postLiveStream')->name('add_stream');
    Route::get('edit_stream/{streamId}', 'App\Http\Controllers\StreamController@putLiveStream')->name('edit_stream');
    Route::get('delete_stream/{streamId}', 'App\Http\Controllers\StreamController@deleteLiveStream')->name('delete_stream');


    // PICTURES  ROUTES
    Route::get('pictures', 'App\Http\Controllers\PictureController@getAllPictures')->name('pictures');
    Route::post('add_picture', 'App\Http\Controllers\PictureController@postPicture')->name('add_picture');
    Route::get('edit_picture/{pictureId}', 'App\Http\Controllers\PictureController@putPicture')->name('edit_picture');
    Route::get('delete_picture/{pictureId}', 'App\Http\Controllers\PictureController@deletePicture')->name('delete_picture');


    // VIDEOS  ROUTES
    Route::get('videos', 'App\Http\Controllers\VideoController@getAllVideos')->name('videos');
    Route::post('add_video', 'App\Http\Controllers\VideoController@postVideo')->name('add_video');
    Route::get('edit_video/{videoId}', 'App\Http\Controllers\VideoController@putVideo')->name('edit_video');
    Route::get('delete_video/{videoId}', 'App\Http\Controllers\VideoController@deleteVideo')->name('delete_video');

});
