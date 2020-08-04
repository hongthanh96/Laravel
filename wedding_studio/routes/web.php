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
});

Route::group(['prefix' => 'home'], function () {

});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
