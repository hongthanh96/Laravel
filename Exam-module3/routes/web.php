<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'BookController@index');

Auth::routes();

Route::get('/home', 'BookController@index')->name('home');

Route::group(['prefix' => 'books'], function () {
    Route::get('/', 'BookController@index')->name('books.index');
    Route::post('/create', 'BookController@create')->name('books.create');
    Route::get('/edit/{id}', 'BookController@edit')->name('books.edit');
    Route::put('/update', 'BookController@update')->name('books.update');
});
