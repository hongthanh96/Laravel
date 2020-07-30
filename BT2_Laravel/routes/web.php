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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'products'], function () {
    Route::get('/','ProductController@index')->name('products.index');
    Route::get('/{product}','ProductController@show')->name('products.show');
});
Route::group(['prefix' => 'cart'], function () {
    Route::get('/Ajaxaddcart/product','CartController@AjaxaddCart')->name('cart.Ajaxaddcart');
    Route::get('/Displaycart/cart','CartController@DisplayCart')->name('cart.displaycart');
    Route::get('/delete/product','CartController@delCart')->name('cart.delcart');
    Route::post('/update','CartController@updateCart')->name('cart.updatecart');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
