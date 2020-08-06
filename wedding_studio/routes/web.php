<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin.home');
    });
    Route::get('/services', 'ServiceController@index')->name('service.index');
    Route::get('/services/create', 'ServiceController@create')->name('service.create');
    Route::post('/services/edit', 'ServiceController@edit')->name('service.edit');
    Route::post('/services/update', 'ServiceController@update')->name('service.update');
    Route::get('/services/destroy', 'ServiceController@destroy')->name('service.destroy');

    Route::get('/albums', 'AlbumController@index')->name('album.index');
    Route::post('/albums/create', 'AlbumController@create')->name('albumsssss.create');
    // Route::post('/albums/edit', 'AlbumController@edit')->name('album.edit');
    // Route::post('/albums/update', 'AlbumController@update')->name('album.update');
    // Route::get('/albums/destroy', 'AlbumController@destroy')->name('album.destroy');




    Route::get('/albumDetail', 'AlbumdetailController@index')->name('albumDetail.index');
    Route::get('/api/album', 'AlbumdetailController@indexalbums');

    Route::post('/albumDetail/store', 'AlbumdetailController@store')->name('albumDetail.store');

    // Route::get('/albumDetail/create', 'ServiceController@create')->name('albumDetail.create');
    // Route::post('/albumDetail/edit', 'ServiceController@edit')->name('albumDetail.edit');
    // Route::post('/albumDetail/update', 'ServiceController@update')->name('albumDetail.update');
    // Route::get('/albumDetail/destroy', 'ServiceController@destroy')->name('albumDetail.destroy');
});

Route::group(['prefix' => 'home'], function () {

});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
