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
    Route::get('/Albums', 'AlbumController@index')->name('album.index');
    Route::get('/albumDetail', 'AlbumdetailController@index')->name('albumDetail.index');


    Route::get('/services', 'ServiceController@index')->name('service.index');
    Route::get('/services/create', 'ServiceController@create')->name('service.create');
    Route::post('/services/edit', 'ServiceController@edit')->name('service.edit');
    Route::post('/services/update', 'ServiceController@update')->name('service.update');
    Route::get('/services/destroy', 'ServiceController@destroy')->name('service.destroy');



});

Route::group(['prefix' => 'albums'], function () {
    Route::get('/apiAlbum','AlbumController@getAlbums')->name('album.apiAlbum');
    Route::post('/create', 'AlbumController@create')->name('album.create');
    Route::get('/edit/{id}', 'AlbumController@edit')->name('album.edit');
    Route::put('/update/{id}', 'AlbumController@update')->name('album.update');
    Route::delete('/destroy/{id}', 'AlbumController@destroy')->name('album.destroy');
});

Route::group(['prefix' => 'albumDetail'], function () {
    Route::get('/apiDetailAlbum','AlbumdetailController@getDetailAlbum');
    Route::get('/apiDetailAlbum/{id}','AlbumdetailController@getDetailAlbumImage');

    // Route::post('/albumDetail/store', 'AlbumdetailController@store')->name('albumDetail.store');

    Route::post('/create', 'AlbumdetailController@create')->name('albumDetail.create');
    // Route::post('/albumDetail/edit', 'AlbumdetailController@edit')->name('albumDetail.edit');
    // Route::post('/albumDetail/update', 'AlbumdetailController@update')->name('albumDetail.update');
    // Route::get('/albumDetail/destroy', 'AlbumdetailController@destroy')->name('albumDetail.destroy');
});


Route::group(['prefix' => 'home'], function () {

});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
